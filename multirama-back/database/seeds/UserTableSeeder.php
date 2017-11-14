<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'role' => 1,
            'status' => 1
        ]);
        factory(User::class, 10)->create();
    }
}
