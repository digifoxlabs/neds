<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DefaultSeeder extends Seeder
{
    public function run()
    {

        //Default User 
        $data = [
            'password' => password_hash("password", PASSWORD_DEFAULT),
            'name' => 'ADMIN',
            'mobile' => '9999999999',
            'email'    => 'admin@gmail.com',
            'gender'    => 'male',
            'dob' => '2022-01-01',
            'address' => NULL,
            'district' => NULL,
            'user_type' => 'admin',
            'created_by' => 1,
            'status' => 1,

        ];       
        
        $u_id= $this->db->table('users')->insert($data);

        //Admin permissions
        $gdata = [
                
                 'group_name' => 'superadmin',
                'permissions' => 'a:4:{i:0;s:9:"createAll";i:1;s:7:"viewAll";i:2;s:9:"updateAll";i:3;s:9:"deleteAll";}',             
    
        ];        
        $g_id = $this->db->table('groups')->insert($gdata);


        //Map Default user-group
        $ugdata = [
            'u_id'=> $u_id,
            'g_id' => $g_id,
        ];
        $this->db->table('user_group')->insert($ugdata);



        //District Coordinator & Operator Group Permissions

        $addgdata = [
            [

                'group_name' => 'district',
                'permissions' => 'a:4:{i:0;s:14:"createOperator";i:1;s:12:"viewOperator";i:2;s:14:"updateOperator";i:3;s:14:"deleteOperator";}'
                
            ],
            [

                'group_name' => 'operator',
                'permissions' => 'a:4:{i:0;s:14:"createCustomer";i:1;s:12:"viewCustomer";i:2;s:14:"updateCustomer";i:3;s:14:"deleteCustomer";}'
                
            ]    

        ];

        $g_id = $this->db->table('groups')->insertbatch($addgdata);


        //Default Site Title
        $sdata = [
            [
                'key'=> 'site_title',
                'value' => 'MY APP',
            ],
            [
                'key'=> 'site_footer',
                'value' => 'Copyright © 2022',

            ]
           
        ];
        $this->db->table('settings')->insertbatch($sdata);



    }
}
