<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Settings extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'id' => [
                'type' => 'INT',
                'constraint'     => 32,
                'auto_increment'=>true,
            ],

            'key' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
                'unique' => true,
            ],

            'value' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            
        ]);

        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('settings');
    }

    public function down()
    {
        $this->forge->dropTable('settings');
    }
}
