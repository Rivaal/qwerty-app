<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'username' => [
                'type' => 'CHAR',
                'constraint' => 30,
            ],
            'userpassword' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'userlevel' => [
                'type' => 'INT',
                'constraint' => 2,
            ],
            'userfullname' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'userphonenumber' => [
                'type' => 'VARCHAR',
                'constraint' => 16,
            ],
            'useraddress' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('username');
        $this->forge->createTable('tb_user');

        $this->db->table('tb_user')->insert([
            'userlevel' => '0',
            'username' => 'Rival',
            'userpassword' => password_hash('superadmin', PASSWORD_DEFAULT),
            'userfullname' => 'Rivaldo Saputra',
            'userphonenumber' => '081365010229',
            'useraddress' => 'Sumatera Barat',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->db->table('tb_user')->insert([
            'userlevel' => '1',
            'username' => 'Tommy',
            'userpassword' => password_hash('admin123', PASSWORD_DEFAULT),
            'userfullname' => 'Thomas Shelby',
            'userphonenumber' => '081111222233',
            'useraddress' => 'Birmingham',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->db->table('tb_user')->insert([
            'userlevel' => '2',
            'username' => 'Ronaldo',
            'userpassword' => password_hash('karyawan123', PASSWORD_DEFAULT),
            'userfullname' => 'Cristiana Ronaldo',
            'userphonenumber' => '082354635473',
            'useraddress' => 'Portugal',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->db->table('tb_user')->insert([
            'userlevel' => '3',
            'username' => 'James',
            'userpassword' => password_hash('arthur', PASSWORD_DEFAULT),
            'userfullname' => 'James Arthur',
            'userphonenumber' => '082354635473',
            'useraddress' => 'England',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('tb_user');
    }
}
