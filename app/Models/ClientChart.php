<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientChart extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'clientchart';
    protected $allowedFields    = [
        'id_chart',
        'id_client',
        'id_package',
        'create_chart',
    ];
    public function findChart($idpackage, $idclient)
    {
        $db = db_connect();
        $builder = $db->table('clientchart c');
        $builder->select('*')
                ->where('c.id_client', "$idclient")
                ->where('c.id_package', "$idpackage")
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return true;
        } else {
            return false;
        }
    }
    public function detailChart($idpackage, $idclient)
    {
        $db = db_connect();
        $builder = $db->table('clientchart c');
        $builder->select('*')
                ->where('c.id_client', "$idclient")
                ->where('c.id_package', "$idpackage")
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package[0];
    }
    public function thisClientChart($idclient)
    {
        $db = db_connect();
        $builder = $db->table('clientchart c');
        $builder->select('c.id_package, p.title_package, p.price_last_package, p.image_package, p.type_package')
                ->join('package p', 'p.id_package = c.id_package')
                ->where('c.id_client', "$idclient")
                ->orderBy('c.id_chart', 'DESC');
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package;
    }
    public function getLastData()
    {
        $db = db_connect();
        $builder = $db->table('clientchart c');
        $builder->select('c.id_chart')
                ->orderBy('c.id_chart', 'DESC')
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return $package[0]['id_chart'];
        } else {
            return "CH-000";
        }
    }
    public function addingChart($idchart, $idclient, $idpackage)
    {
        $db = db_connect();
        $builder = $db->table('clientchart c');
        $data = [
            'id_chart' => $idchart,
            'id_client' => $idclient,
            'id_package' => $idpackage,
            'create_chart' => date('Y-m-d H:i:s')
        ];
        $builder->insert($data);
    }
    public function removingChart($idclient, $idpackage)
    {
        $db = db_connect();
        $builder = $db->table('clientchart c');
        $builder->where('id_client', $idclient);
        $builder->where('id_package', $idpackage);
        $builder->delete();
    }
}
