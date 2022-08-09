<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Groups extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'g_id' => [
                'type' => 'INT',
                'constraint'     => 32,
                'auto_increment'=>true,
            ],

            'group_name' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
                'unique' => true,
            ],

            'permissions' => [
                'type' => 'LONGTEXT',
            ],
                      
            'created_at datetime default current_timestamp',
           
        ]);

        $this->forge->addPrimaryKey('g_id');
        $this->forge->createTable('groups');
    }

    public function down()
    {
        $this->forge->dropTable('groups');
    }
}
