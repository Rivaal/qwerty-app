<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailPackage extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'detailpackage';
    protected $allowedFields    = [
        'id_dp',
        'id_package',
        'size_dp',
        'person_dp',
        'expose_dp',
        'tag_dp',
        'type_dp',
        'duration_dp',
        'location_dp',
        'printout_dp',
        'create_dp',
    ];

    public function singleDetail($id)
    {
        $db = db_connect();
        $builder = $db->table('package p');
        $builder->select('p.id_package, p.type_package, p.title_package, p.desc_package, p.price_init_package, p.disc_package, p.price_last_package, p.image_package, p.note_package, dp.id_dp, dp.size_dp, dp.person_dp, dp.expose_dp, dp.tag_dp, dp.type_dp, dp.duration_dp, dp.location_dp, dp.printout_dp, dp.image1_dp, dp.image2_dp')
                ->join('detailpackage dp', 'p.id_package = dp.id_package')
                ->where('p.id_package', "$id")
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package[0];
    }

    public function otherPackage($id)
    {
        $db = db_connect();
        $builder = $db->table('package p');
        $builder->select('p.id_package, p.title_package, p.price_last_package, p.disc_package, p.price_init_package ,p.image_package')
                ->where('p.id_package !=', "$id")
                ->orderBy('RAND()')
                ->limit(5);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package;
    }
}
