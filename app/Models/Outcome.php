<?php

namespace App\Models;

use CodeIgniter\Model;

class Outcome extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'outcome';
    protected $allowedFields    = [
        'outcome_id',
        'outcome_nominal',
        'outcome_type',
        'outcome_desc',
        'outcome_actor',
        'outcome_created'
    ];

    public function getAllData()
    {
        $db = db_connect();
        $builder = $db->table('outcome i');
        $builder->select('*');
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories;
    }
    public function getLastData()
    {
        $db = db_connect();
        $builder = $db->table('outcome i');
        $builder->select('i.outcome_id')
                ->orderBy('i.outcome_id', 'DESC')
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return $package[0]['outcome_id'];
        } else {
            return "OU-OO1";
        }
    }
    public function addingOutcome($id, $nominal, $type, $desc, $actor, $tanggal)
    {
        $db = db_connect();
        $builder = $db->table('outcome i');
        $data = [
            'outcome_id' => $id,
            'outcome_nominal' => $nominal,
            'outcome_desc' => $desc,
            'outcome_type' => $type,
            'outcome_actor' => $actor,
            'outcome_created' => $tanggal
        ];
        $builder->insert($data);
    }
    public function sumAll()
    {
        $db = db_connect();
        $db = db_connect();
        $builder = $db->table('outcome i');
        $builder->selectSum('outcome_nominal', 'total');
        $query = $builder->get();
        $result = $query->getRow();

        return $result->total;
    }
}