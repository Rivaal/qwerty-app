<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class DetailPackage extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_dp' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'id_package' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'size_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'person_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'expose_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'tag_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 225,
            ],
            'type_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'duration_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'location_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'printout_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'image1_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'image2_dp' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'create_dp' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('id_dp');
        $this->forge->createTable('detailpackage');

        $this->db->table('detailpackage')->insert([
            'id_dp' => 'DP-001',
            'id_package' => 'PIND-001',
            'size_dp' => '4R (4pcs), 12R + Frame (1pcs)',
            'person_dp' => '2 Orang',
            'expose_dp' => '6 Expose',
            'tag_dp' => "Baby, Bunda, Bayi, Indoor, Landscape",
            'type_dp' => 'Landscape',
            'duration_dp' => '90 Menit',
            'location_dp' => 'Indoor',
            'printout_dp' => '5 Lembar',
            'image1_dp' => 'PIND-001-1.jpg',
            'image2_dp' => 'PIND-001-2.jpg',
            'create_dp' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('detailpackage')->insert([
            'id_dp' => 'DP-002',
            'id_package' => 'PIND-002',
            'size_dp' => '4R (5pcs), 8R + Frame (1pcs), 20R + Frame (1pcs)',
            'person_dp' => '2 Orang',
            'expose_dp' => '8 Expose',
            'tag_dp' => "Baby, Orang tua, Bayi, Bunda, Indoor, Landscape",
            'type_dp' => 'Landscape',
            'duration_dp' => '120 Menit',
            'location_dp' => 'Indoor',
            'printout_dp' => '7 Lembar',
            'image1_dp' => 'PIND-001-1.jpg',
            'image2_dp' => 'PIND-001-2.jpg',
            'create_dp' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('detailpackage')->insert([
            'id_dp' => 'DP-003',
            'id_package' => 'POUT-001',
            'size_dp' => '4R (7pcs), 8R + Frame (2pcs), 20R + Frame (1pcs)',
            'person_dp' => '2 Orang',
            'expose_dp' => '8 Expose',
            'tag_dp' => "Wedding, Pre Wedding, Outdoor, Landscape, Couple",
            'type_dp' => 'Landscape',
            'duration_dp' => '180 Menit',
            'location_dp' => 'Outdoor',
            'printout_dp' => '10 Lembar',
            'image1_dp' => 'PIND-001-1.jpg',
            'image2_dp' => 'PIND-001-2.jpg',
            'create_dp' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('detailpackage');
    }
}
