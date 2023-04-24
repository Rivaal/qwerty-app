<?php

namespace App\Models;

use CodeIgniter\Model;

class BuktiTransaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'buktitransaksi';
    protected $allowedFields    = [
        'id_bukti',
        'id_booking',
        'total_bayar',
        'nominal_bayar',
        'metode_bayar',
        'no_rek',
        'atas_nama',
        'bukti_url',
        'create_bukti',
    ];
    public function getLastData()
    {
        $db = db_connect();
        $builder = $db->table('buktitransaksi b');
        $builder->select('b.id_bukti')
                ->orderBy('b.id_bukti', 'DESC')
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return $package[0]['id_bukti'];
        } else {
            return "BT-000";
        }
    }
    public function findBukti($idbooking)
    {
        $db = db_connect();
        $builder = $db->table('buktitransaksi c');
        $builder->select('*')
                ->where('c.id_booking', "$idbooking")
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return true;
        } else {
            return false;
        }
    }
    public function detailBukti($idbooking)
    {
        $db = db_connect();
        $builder = $db->table('buktitransaksi c');
        $builder->select('*')
                ->where('c.id_booking', "$idbooking")
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package[0];
    }
}
