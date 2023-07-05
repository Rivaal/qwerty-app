<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Income extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'income_id' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'income_nominal' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'income_type' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'income_desc' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'income_actor' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'income_created' => [
                'type' => 'DATETIME',
            ],
        ]);
        $this->forge->createTable('income');

        $this->db->table('income')->insert([
            'income_id' => 'IN-001',
            'income_nominal' => '350000',
            'income_type' => 'DEPOSIT',
            'income_desc' => 'booking online. user: 081365010229',
            'income_actor' => 'Rivaal',
            'income_created' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('income');
    }
}
