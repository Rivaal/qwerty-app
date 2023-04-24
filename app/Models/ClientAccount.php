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
    public function clientDetail($id)
    {
        $db = db_connect();
        $builder = $db->table('clientaccount c');
        $builder->select('*')
                ->where('c.id_client =', "$id")
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package[0];
    }
}
