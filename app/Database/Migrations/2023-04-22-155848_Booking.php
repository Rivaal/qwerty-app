<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Booking extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_booking' => [
                'type' => 'CHAR',
                'constraint' => 50,
            ],
            'id_client' => [
                'type' => 'CHAR',
                'constraint' => 50,
            ],
            'id_package' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'lokasi' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'harga_katalog' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'diskon' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'total_akhir' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'tanggal_sesi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'jam_sesi' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'catatan' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
                'null' => true,
            ],
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'invoice' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'create_chart' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_booking');
        $this->forge->createTable('booking');
    }

    public function down()
    {
        $this->forge->dropTable('booking');
    }
}
