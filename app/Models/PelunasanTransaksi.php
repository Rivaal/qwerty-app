<?php

namespace App\Models;

use CodeIgniter\Model;

class PelunasanTransaksi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'pelunasantransaksi';
    protected $allowedFields    = [
        'id_pelunasan',
        'id_booking',
        'total_bayar',
        'nominal_bayar',
        'metode_bayar',
        'no_rek',
        'atas_nama',
        'pelunasan_url',
        'create_pelunasan',
    ];
    public function getLastData()
    {
        $db = db_connect();
        $builder = $db->table('pelunasantransaksi b');
        $builder->select('b.id_pelunasan')
                ->orderBy('b.id_pelunasan', 'DESC')
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return $package[0]['id_pelunasan'];
        } else {
            return "PL-000";
        }
    }
    public function findPelunasan($idbooking)
    {
        $db = db_connect();
        $builder = $db->table('pelunasantransaksi c');
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
    public function detailPelunasan($idbooking)
    {
        $db = db_connect();
        $builder = $db->table('pelunasantransaksi c');
        $builder->select('*')
                ->where('c.id_booking', "$idbooking")
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package[0];
    }
}
