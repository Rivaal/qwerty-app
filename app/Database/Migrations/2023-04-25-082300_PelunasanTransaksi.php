<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class PelunasanTransaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_pelunasan' => [
                'type' => 'CHAR',
                'constraint' => 50,
            ],
            'id_booking' => [
                'type' => 'CHAR',
                'constraint' => 50,
            ],
            'total_bayar' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'nominal_bayar' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'metode_bayar' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'no_rek' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'atas_nama' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'pelunasan_url' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'create_pelunasan' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_pelunasan');
        $this->forge->createTable('pelunasantransaksi');
    }
    public function down()
    {
        $this->forge->dropTable('pelunasantransaksi');
    }
}
