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
            'desc_package' => "Ini adalah paket untuk Foto Balita + Bunda",
            'price_init_package' => '200000',
            'disc_package' => '0',
            'price_last_package' => '200000',
            'image_package' => 'PIND-001.jpeg',
            'note_package' => 'Note: -',
            'create_package' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('package')->insert([
            'id_package' => 'PIND-002',
            'type_package' => 'IND',
            'title_package' => 'Foto Balita + Orang Tua',
            'desc_package' => "Ini adalah paket untuk Foto Balita + Orang Tua",
            'price_init_package' => '200000',
            'disc_package' => '50',
            'price_last_package' => '100000',
            'image_package' => 'PIND-001.jpeg',
            'note_package' => 'Note: Penambahan orang Rp 15.000/Orang.',
            'create_package' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('package')->insert([
            'id_package' => 'POUT-001',
            'type_package' => 'OUT',
            'title_package' => 'Pre-Wedding Outdoor 1',
            'desc_package' => "Paket foto pre-wedding outdoor",
            'price_init_package' => '225000',
            'disc_package' => '0',
            'price_last_package' => '225000',
            'image_package' => 'POUT-001.jpg',
            'note_package' => 'Note: Busana sudah ditanggung',
            'create_package' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('package');
    }
}
