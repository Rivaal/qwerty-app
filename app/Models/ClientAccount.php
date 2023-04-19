<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientAccount extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'clientaccount';
    protected $allowedFields    = [
        'id_client',
        'nama_client',
        'telp_client',
        'alamat_client',
        'username',
        'password',
        'image_client',
        'create_client',
    ];
}
