<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Video extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_video' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'title_video' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'cover_video' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'url_video' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'category_video' => [
                'type' => 'VARCHAR',
                'constraint' => 500,
            ],
            'create_date' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id_video');
        $this->forge->createTable('video');

        $this->db->table('video')->insert([
            'id_video' => 'VID001',
            'title_video' => 'TARUNA',
            'cover_video' => 'VID001.jpg',
            'url_video' => 'https://www.instagram.com/reel/CnYZ35HjKFa/',
            'category_video' => 'instagram',
            'create_date' => date('Y-m-d H:i:s'),
        ]);
        $this->db->table('video')->insert([
            'id_video' => 'VID002',
            'title_video' => 'Trailer Balong',
            'cover_video' => 'VID002.jpg',
            'url_video' => 'https://www.instagram.com/reel/Cnbg0-VDp0z/',
            'category_video' => 'instagram',
            'create_date' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('video');
    }
}
