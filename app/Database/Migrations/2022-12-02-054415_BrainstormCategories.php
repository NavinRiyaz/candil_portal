<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class BrainstormCategories extends Migration
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
            'category_name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'category_description' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => true,
            ],
            'category_image' => [
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
        $this->forge->createTable('brainstorm_category');
    }

    public function down()
    {
        //
    }
}
