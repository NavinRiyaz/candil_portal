<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Staffs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 50,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'profile_image' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'id_proof' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'role' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'log' => [
                'type'    => 'TIMESTAMP',
                'default' => new RawSql('CURRENT_TIMESTAMP'),
            ],
        ]);
        $this->forge->addPrimaryKey('id', true);
        $this->forge->createTable('staffs');
    }

    public function down()
    {
        //
    }
}
