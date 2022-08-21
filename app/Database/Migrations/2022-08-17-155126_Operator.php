<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Operator extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'o_id' => [
                'type' => 'INT',
                'constraint'     => 32,
                'auto_increment'=>true,
            ],       

            'name' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'gender' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],  
            
            'dob' => [
                'type' => 'DATE',
                
            ],
            'contact' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],  
            
            'email' => [
                'type' => 'TEXT',
            ],   

            'address' => [
                'type' => 'TEXT',
            ],   
            
            'image' => [
                'type' => 'TEXT',
                'null' =>true,
  
            ],    
            'status' => [
                'type' => 'INT',
                'constraint'=> '32',
                'default' => 1,
            ],             
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('o_id');
        $this->forge->createTable('operator');
    }

    public function down()
    {
        $this->forge->dropTable('operator');
    }
}
