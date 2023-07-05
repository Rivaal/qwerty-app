<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AdminAccount extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_admin' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'nama_admin' => [
                'type' => 'CHAR',
                'constraint' => 100,
            ],
            'telp_admin' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'alamat_admin' => [
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
            'image_admin' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'create_admin' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_admin');
        $this->forge->createTable('adminaccount');
        $this->db->table('adminaccount')->insert([
            'id_admin' => 'AD-001',
            'nama_admin' => 'Rival Artwork',
            'telp_admin' => '081234567890',
            'alamat_admin' => 'Australia',
            'username' => 'rivaaal',
            'password' => password_hash('11223344', PASSWORD_DEFAULT),
            'image_admin' => 'avatar.jpg',
            'create_admin' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('adminaccount');
    }
}
