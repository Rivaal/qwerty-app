<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categories' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'title_categories' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'create_categories' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_categories');
        $this->forge->createTable('categories');

        $this->db->table('categories')->insert([
            'id_categories' => 'KAT001',
            'title_categories' => 'Wedding',
            'create_categories' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('categories')->insert([
            'id_categories' => 'KAT002',
            'title_categories' => 'Family',
            'create_categories' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('categories')->insert([
            'id_categories' => 'KAT003',
            'title_categories' => 'Photogroup',
            'create_categories' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('categories')->insert([
            'id_categories' => 'KAT004',
            'title_categories' => 'Graduation',
            'create_categories' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('categories')->insert([
            'id_categories' => 'KAT005',
            'title_categories' => 'Couple',
            'create_categories' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('categories');
    }
}
