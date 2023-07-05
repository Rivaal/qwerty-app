<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Outcome extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'outcome_id' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'outcome_nominal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'outcome_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'outcome_desc' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'outcome_actor' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'outcome_created' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->createTable('outcome');

        $this->db->table('outcome')->insert([
            'outcome_id' => 'OU-001',
            'outcome_nominal' => '350000',
            'outcome_type' => 'Uang Keluar',
            'outcome_desc' => 'keperluan lainnya',
            'outcome_actor' => 'test',
            'outcome_created' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('outcome');
    }
}
