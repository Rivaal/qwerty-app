<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientAccount extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_client' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'nama_client' => [
                'type' => 'CHAR',
                'constraint' => 100,
            ],
            'telp_client' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_client' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
            ],
            'username' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'password' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
            ],
            'image_client' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'create_client' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_client');
        $this->forge->createTable('clientaccount');
        $this->db->table('clientaccount')->insert([
            'id_client' => 'CL-001',
            'nama_client' => 'Rivaldi Ananda',
            'telp_client' => '081365010229',
            'alamat_client' => 'Tarusan, Pesisir Selatan',
            'username' => 'rivaal',
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'image_client' => 'avatar.jpg',
            'create_client' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('clientaccount');
    }
}
