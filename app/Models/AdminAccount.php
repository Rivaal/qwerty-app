<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminAccount extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'adminaccount';
    protected $allowedFields    = [
        'id_admin',
        'nama_admin',
        'telp_admin',
        'alamat_admin',
        'username',
        'password',
        'image_admin',
        'create_admin',
    ];
}
