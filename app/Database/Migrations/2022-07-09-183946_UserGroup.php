<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserGroup extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'ug_id' => [
                'type' => 'INT',
                'constraint'     => 32,
                'auto_increment'=>true,
            ],

            'u_id' => [
                'type' => 'INT',
            ],

            'g_id' => [
                'type' => 'INT',
            ],
                      
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
           
        ]);

        $this->forge->addPrimaryKey('ug_id');
        $this->forge->createTable('user_group');
    }

    public function down()
    {
        $this->forge->dropTable('user_group');
    }
}
