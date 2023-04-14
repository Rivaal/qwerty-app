<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gallery extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_gallery' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'title_gallery' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'description_gallery' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'category_gallery' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'cover_gallery' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'information_gallery' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'client_gallery' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'create_by' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'create_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_gallery');
        $this->forge->createTable('gallery');

        $this->db->table('gallery')->insert([
            'id_gallery' => 'GAL001',
            'title_gallery' => 'Capture on 12/12/2022',
            'description_gallery' => 'Ini adalah galeri wedding kami.',
            'category_gallery' => 'KAT001,KAT005',
            'cover_gallery' => 'GAL001.jpg',
            'client_gallery' => 'Mr. X',
            'information_gallery' => 'Di ambil di Studio QWERTY',
            'create_by' => 'Rival Artwork',
            'create_date' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('gallery')->insert([
            'id_gallery' => 'GAL002',
            'title_gallery' => 'Capture on 12/12/2022',
            'description_gallery' => 'Ini adalah galeri family kami.',
            'category_gallery' => 'KAT002,KAT003',
            'cover_gallery' => 'GAL002.jpg',
            'client_gallery' => 'Mr. X',
            'information_gallery' => 'Di ambil di Studio QWERTY',
            'create_by' => 'Rival Artwork',
            'create_date' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('gallery')->insert([
            'id_gallery' => 'GAL003',
            'title_gallery' => 'Capture on 19/09/2019',
            'description_gallery' => 'Ini adalah galeri Photogroup kami.',
            'category_gallery' => 'KAT003',
            'cover_gallery' => 'GAL003.jpg',
            'client_gallery' => 'Mr. X',
            'information_gallery' => 'Di ambil di Studio QWERTY',
            'create_by' => 'Rival Artwork',
            'create_date' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('gallery')->insert([
            'id_gallery' => 'GAL004',
            'title_gallery' => 'Capture on 19/09/2019',
            'description_gallery' => 'Ini adalah galeri Photogroup kami.',
            'category_gallery' => 'KAT003',
            'cover_gallery' => 'GAL004.jpeg',
            'client_gallery' => 'Mr. X',
            'information_gallery' => 'Di ambil di Studio QWERTY',
            'create_by' => 'Rival Artwork',
            'create_date' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('gallery')->insert([
            'id_gallery' => 'GAL005',
            'title_gallery' => 'Capture on 19/09/2019',
            'description_gallery' => 'Ini adalah galeri Photogroup kami.',
            'category_gallery' => 'KAT004,KAT005',
            'cover_gallery' => 'GAL005.jpeg',
            'client_gallery' => 'Mr. X',
            'information_gallery' => 'Di ambil di Studio QWERTY',
            'create_by' => 'Rival Artwork',
            'create_date' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('gallery');
    }
}