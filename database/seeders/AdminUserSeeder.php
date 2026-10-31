<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use InvalidArgumentException;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = config('admin.email');
        $password = config('admin.password');

        if (blank($email) && blank($password)) {
            return;
        }

        if (blank($email) || blank($password)) {
            throw new InvalidArgumentException('ADMIN_EMAIL dan ADMIN_PASSWORD harus diisi bersama.');
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($password) < 8) {
            throw new InvalidArgumentException('Email admin harus valid dan password minimal 8 karakter.');
        }

        $user = User::firstOrNew(['email' => $email]);

        if (! $user->exists) {
            $user->name = config('admin.name');
            $user->password = $password;
        }

        $user->role = 'admin';
        $user->save();
    }
}
