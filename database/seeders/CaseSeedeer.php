<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class CaseSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        User::create([
            'name' => 'Hamilton Rivera',
            'email' => 'rivera.hamilton21@gmail.com',
            'password' => bcrypt('admin')
        ]);
    }
}
