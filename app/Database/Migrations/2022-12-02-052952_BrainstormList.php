<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class Brainstorm extends Migration
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
            'user' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'category' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'cover_image' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'verified' => [
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
        $this->forge->createTable('brainstorm_list');
    }

    public function down()
    {
        //
    }
}
