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

    public function outdoorPackage()
    {
        $db = db_connect();
        $builder = $db->table('package p');
        $builder->select('*')
                ->where('p.type_package =', 'OUT')
                ->limit(30);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package;
    }

    public function detailPackage($id)
    {
        $db = db_connect();
        $builder = $db->table('package p');
        $builder->select('*')
                ->where('p.id_package =', "$id")
                ->limit(30);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package[0];
    }

    public function searchPackage($id)
    {
        $db = db_connect();
        $builder = $db->table('package p');
        $builder->select('p.id_package, p.type_package, p.title_package, p.desc_package, p.price_init_package, p.disc_package, p.price_last_package, p.image_package, p.note_package')
                ->join('detailpackage dp', 'p.id_package = dp.id_package')
                ->like('p.title_package', "%$id%")
                ->orLike('dp.tag_dp', "%$id%")
                ->limit(30);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package;
    }
}
