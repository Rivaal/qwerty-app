<?php

namespace App\Models;

use CodeIgniter\Model;

class Package extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'package';
    protected $allowedFields    = [
        'id_package',
        'type_package',
        'title_package',
        'desc_package',
        'price_init_package',
        'disc_package',
        'price_last_package',
        'image_package',
        'note_package',
        'create_package',
    ];

    public function indoorPackage()
    {
        $db = db_connect();
        $builder = $db->table('package p');
        $builder->select('*')
                ->where('p.type_package =', 'IND')
                ->limit(30);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package;
    }
}
