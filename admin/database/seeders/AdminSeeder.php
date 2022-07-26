<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::Where('email', 'admin@example.com')->first();

        if(is_null($user))
        {
            $user = Admin::create([
                'name'      => 'Soumik Ahammed',
                'email'     => 'admin@example.com',
                'mobile'    => '01689201370',
                'password'  => bcrypt('abc123'),
                'status'    => 1
            ]);

            $user->assignRole('Admin');
        }

    }
}
