<?php

namespace App\Models;

use CodeIgniter\Model;

class Income extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'income';
    protected $allowedFields    = [
        'income_id',
        'income_nominal',
        'income_type',
        'income_desc',
        'income_actor',
        'income_created'
    ];

    public function getAllData()
    {
        $db = db_connect();
        $builder = $db->table('income i');
        $builder->select('*');
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories;
    }
    public function getLastData()
    {
        $db = db_connect();
        $builder = $db->table('income i');
        $builder->select('i.income_id')
                ->orderBy('i.income_id', 'DESC')
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return $package[0]['income_id'];
        } else {
            return "IN-OO1";
        }
    }
    public function addingIncome($id, $nominal, $type, $desc, $actor, $tanggal)
    {
        $db = db_connect();
        $builder = $db->table('income i');
        $data = [
            'income_id' => $id,
            'income_nominal' => $nominal,
            'income_type' => $type,
            'income_desc' => $desc,
            'income_actor' => $actor,
            'income_created' => $tanggal
        ];
        $builder->insert($data);
    }
    public function sumDeposit()
    {
        $db = db_connect();
        $db = db_connect();
        $builder = $db->table('income i');
        $builder->selectSum('income_nominal', 'total')
                ->where('income_type', 'DEPOSIT');
        $query = $builder->get();
        $result = $query->getRow();

        return $result->total;
    }
    public function sumPelunasan()
    {
        $db = db_connect();
        $db = db_connect();
        $builder = $db->table('income i');
        $builder->selectSum('income_nominal', 'total')
                ->where('income_type', 'PELUNASAN');
        $query = $builder->get();
        $result = $query->getRow();

        return $result->total;
    }
    public function sumAll()
    {
        $db = db_connect();
        $db = db_connect();
        $builder = $db->table('income i');
        $builder->selectSum('income_nominal', 'total');
        $query = $builder->get();
        $result = $query->getRow();

        return $result->total;
    }
}