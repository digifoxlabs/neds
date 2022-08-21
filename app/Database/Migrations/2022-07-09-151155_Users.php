<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'u_id' => [
                'type' => 'INT',
                'constraint'     => 32,
                'auto_increment'=>true,
            ],         

            'password' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'mobile' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],
            'gender' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
                'null' =>true,
            ],
            'dob' => [

                'type' => 'DATE',
            ],

            'address' => [
                'type' => 'TEXT',
                'null' =>true,
            ],
            
            'district' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
                'null' => true,
                'default' => NULL
            ],  

            'user_type' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',    
            ],

            'created_by' => [
                'type' => 'INT',
                'constraint'=> 32,    
            ],

            'image' => [
                'type' => 'TEXT',
                'null' =>true,  
            ],

            'status' => [
                'type' => 'INT',
                'constraint'=> 32,    
                'default' => 1,
            ],

            'last_login datetime' ,
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('u_id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
