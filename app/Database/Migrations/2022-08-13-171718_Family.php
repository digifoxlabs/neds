<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Family extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'f_id' => [
                'type' => 'INT',
                'constraint'     => 32,
                'auto_increment'=>true,
            ],         

            'c_id' => [
                'type' => 'INT',
                'constraint'=> '32',
            ],

            'relationship' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'member_name' => [
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

            'aadhar' => [
                'type' => 'TEXT',
            ],


            'is_disable' => [
                'type' => 'VARCHAR',
                'constraint'=> '128',
            ],
            'disability' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'disabilitypcn' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],   
            
            'image' => [
                'type' => 'TEXT',
                'null' =>true,
  
            ],
    
          
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('f_id');
        $this->forge->createTable('family');
    }

    public function down()
    {
        $this->forge->dropTable('family');
    }
}
