<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthFlowTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_and_registration_pages_render(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Masuk ke akun');

        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Buat akun baru');
    }

    public function test_registration_creates_user_and_ignores_submitted_admin_role(): void
    {
        $response = $this->post(route('register.store'), [
            'name' => 'Mahasiswa SI',
            'email' => 'mahasiswa@example.test',
            'password' => 'password-aman',
            'password_confirmation' => 'password-aman',
            'role' => 'admin',
        ]);

        $response->assertRedirect(route('user.dashboard'));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'mahasiswa@example.test',
            'role' => 'user',
        ]);
    }

    public function test_registration_rejects_unconfirmed_password(): void
    {
        $response = $this->from(route('register'))->post(route('register.store'), [
            'name' => 'Mahasiswa SI',
            'email' => 'mahasiswa@example.test',
            'password' => 'password-aman',
            'password_confirmation' => 'password-berbeda',
        ]);

        $response->assertRedirect(route('register'));
        $response->assertSessionHasErrors('password');
        $this->assertDatabaseCount('users', 0);
    }

    public function test_user_login_redirects_to_user_dashboard(): void
    {
        User::factory()->create([
            'email' => 'user@example.test',
            'password' => 'password-aman',
        ]);

        $response = $this->post(route('login.store'), [
            'email' => 'user@example.test',
            'password' => 'password-aman',
        ]);

        $response->assertRedirect(route('user.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_admin_login_redirects_to_admin_dashboard(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.test',
            'password' => 'password-aman',
        ]);
        $admin->role = 'admin';
        $admin->save();

        $response = $this->post(route('login.store'), [
            'email' => 'admin@example.test',
            'password' => 'password-aman',
        ]);

        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticatedAs($admin);
    }

    public function test_admin_seeder_creates_configured_admin_account(): void
    {
        config([
            'admin.name' => 'Admin SI',
            'admin.email' => 'admin@example.test',
            'admin.password' => 'password-admin',
        ]);

        $this->seed(AdminUserSeeder::class);

        $this->assertDatabaseHas('users', [
            'name' => 'Admin SI',
            'email' => 'admin@example.test',
            'role' => 'admin',
        ]);
    }

    public function test_login_rejects_invalid_credentials(): void
    {
        $response = $this->from(route('login'))->post(route('login.store'), [
            'email' => 'missing@example.test',
            'password' => 'password-aman',
        ]);

        $response->assertRedirect(route('login'));
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_user_cannot_access_admin_routes(): void
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_guest_is_redirected_to_login_from_admin_routes(): void
    {
        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_admin_cannot_access_user_routes(): void
    {
        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $this->actingAs($admin)
            ->get(route('user.dashboard'))
            ->assertForbidden();
    }

    public function test_logout_ends_the_authenticated_session(): void
    {
        $user = User::factory()->create();
        $user->role = 'user';
        $user->save();

        $this->actingAs($user)
            ->get(route('user.dashboard'))
            ->assertOk()
            ->assertSee('Keluar')
            ->assertSee('action="'.route('logout').'"', false);

        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();

        $this->get(route('user.dashboard'))
            ->assertRedirect(route('login'));
    }

    public function test_admin_logout_ends_the_authenticated_session(): void
    {
        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('Keluar')
            ->assertSee('action="'.route('logout').'"', false);

        $this->post(route('logout'))
            ->assertRedirect(route('login'));

        $this->assertGuest();

        $this->get(route('admin.dashboard'))
            ->assertRedirect(route('login'));
    }
}
