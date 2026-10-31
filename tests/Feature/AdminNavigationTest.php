<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminNavigationTest extends TestCase
{
    use RefreshDatabase;

    public function test_each_admin_page_renders_links_to_all_admin_pages_and_marks_current_page_active(): void
    {
        $admin = User::factory()->create();
        $admin->role = 'admin';
        $admin->save();

        $adminRoutes = [
            'admin.dashboard',
            'admin.tugas',
            'admin.jadwal',
            'admin.materi',
        ];

        foreach ($adminRoutes as $activeRoute) {
            $response = $this->actingAs($admin)->get(route($activeRoute));

            $response->assertOk();
            $response->assertSee('Keluar');
            $response->assertSee('action="'.route('logout').'"', false);

            foreach ($adminRoutes as $route) {
                $response->assertSee(route($route), false);
            }

            $html = (string) preg_replace('/\s+/', ' ', $response->getContent());

            $this->assertStringContainsString(
                '<li class="active"> <a href="'.route($activeRoute).'" aria-current="page"',
                $html,
            );
        }
    }
}
