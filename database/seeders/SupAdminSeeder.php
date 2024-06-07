<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'nom' => 'COULIBALY',
            'prenom' => 'Zana',
            'email' => 'zana@gmail.com',
            'password' => bcrypt('password'),


        ]);
    }
}
