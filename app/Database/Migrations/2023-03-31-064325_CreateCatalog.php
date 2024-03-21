<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCatalog extends Migration
{
    public function up()
    {
        $this->forge->addField([
            ' ' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tagline02' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tagline03' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'taglinedesc01' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'taglinedesc02' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'taglinedesc03' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
        ]);
        $this->forge->createTable('tb_catalog');

        $this->db->table('tb_catalog')->insert([
            'tagline01' => 'We Capture Memories.',
            'tagline02' => 'We Make Moments Last.',
            'tagline03' => 'We Create Timeless Photos.',
            'taglinedesc01' => 'Freeze time with QWERTY and cherish your moments forever.',
            'taglinedesc02' => 'Eternalize your special moments with our high-quality photography service.',
            'taglinedesc03' => 'Let us turn your cherished memories into stunning, everlasting photographs.',
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('tb_catalog');
    }
}
