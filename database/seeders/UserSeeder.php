<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(3)->create();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'moderator']);
        Role::create(['name' => 'editor']);
        Role::create(['name' => 'user']);

        User::find(1)->assignRole('admin');
        User::find(2)->assignRole('moderator');
        User::find(3)->assignRole('editor');

        $demoUser = User::create([
            'name' => "Enes Doğan",
            'email' => 'enes@dogan.com',
            'password' => Hash::make('password')
        ]);

        $demoUser->assignRole('admin');

    }
}
