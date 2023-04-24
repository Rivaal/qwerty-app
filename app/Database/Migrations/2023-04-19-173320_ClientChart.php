<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ClientChart extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_chart' => [
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
            'create_chart' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_chart');
        $this->forge->createTable('clientchart');
        $this->db->table('clientchart')->insert([
            'id_chart' => 'CH-001',
            'id_client' => 'CL-001',
            'id_package' => 'PIND-001',
            'create_chart' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('clientchart');
    }
}
