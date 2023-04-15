<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Package extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_package' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'type_package' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'title_package' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
            ],
            'desc_package' => [
                'type' => 'TEXT',
                'constraint' => 225,
            ],
            'price_init_package' => [
                'type' => 'INT',
            ],
            'disc_package' => [
                'type' => 'INT',
            ],
            'price_last_package' => [
                'type' => 'INT',
            ],
            'image_package' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'note_package' => [
                'type' => 'TEXT',
                'contstraint' => 255,
            ],
            'create_package' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_package');
        $this->forge->createTable('package');

        $this->db->table('package')->insert([
            'id_package' => 'PIND-001',
            'type_package' => 'IND',
            'title_package' => 'Foto Balita + Bunda',
            'desc_package' => "Ini adalah contoh katalog indor untuk studio qwerty dengan jenis paket foto balita dan bunda",
            'price_init_package' => '200000',
            'disc_package' => '0',
            'price_last_package' => '200000',
            'image_package' => 'PIND-001.jpeg',
            'note_package' => '90 menit sesi.',
            'create_package' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('package');
    }
}
