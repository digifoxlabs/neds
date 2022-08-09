<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            'user_id' => 'admin',
            'password' => 'admin',
            'name' => 'ADMIN',
            'mobile' => '9999999999',
            'email'    => 'darth@theempire.com'
        ];
       
        $this->db->table('users')->insert($data);

    }

}
