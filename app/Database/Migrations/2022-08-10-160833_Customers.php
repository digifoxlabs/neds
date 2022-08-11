<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Customers extends Migration
{
    public function up()
    {
        $this->forge->addField([

            'c_id' => [
                'type' => 'INT',
                'constraint'     => 32,
                'auto_increment'=>true,
            ],         

            'customer_id' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
                'unique' => true,
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'gender' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'community' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'maritial_status' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'dob' => [
                'type' => 'DATE',
                
            ],

            'disability' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'disability_pcn' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_hno' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_street' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_district' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_adminunit' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_unit_name' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_city' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_contact' => [

                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'res_email' => [

                'type' => 'VARCHAR',
                'constraint'=> '256',
                'null' =>true,
            ],

            'ofc_hno' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'ofc_street' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'ofc_district' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'ofc_adminunit' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'ofc_unit_name' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'ofc_city' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'ofc_contact' => [

                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'ofc_email' => [

                'type' => 'VARCHAR',
                'constraint'=> '256',
                'null' =>true,
            ],

            'ration_card' => [

                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'iden_1' => [
                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'iden_2' => [

                'type' => 'VARCHAR',
                'constraint'=> '256',
            ],

            'status' => [
                'type' => 'INT',
                'constraint'=> '32',
                'default' => 1,
            ],
    
          
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addPrimaryKey('c_id');
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
