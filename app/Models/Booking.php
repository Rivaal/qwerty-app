<?php

namespace App\Models;

use CodeIgniter\Model;

class Booking extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'booking';
    protected $allowedFields    = [
        'id_booking',
        'id_client',
        'id_package',
        'lokasi',
        'harga_katalog',
        'diskon',
        'total_akhir',
        'tanggal_sesi',
        'jam_sesi',
        'catatan',
        'status',
        'create_chart',
    ];
    public function getLastData()
    {
        $db = db_connect();
        $builder = $db->table('booking b');
        $builder->select('b.id_booking')
                ->orderBy('b.id_booking', 'DESC')
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        if ($package) {
            return $package[0]['id_booking'];
        } else {
            return "BK-000";
        }
    }
    public function detailBook($idbooking)
    {
        $db = db_connect();
        $builder = $db->table('booking b');
        $builder->select('b.id_booking, b.id_client, b.id_package, b.lokasi, b.harga_katalog, b.diskon, b.total_akhir, b.tanggal_sesi, b.jam_sesi, b.catatan, b.status, b.create_chart, p.type_package, p.title_package, p.desc_package, p.image_package, p.note_package')
                ->where('b.id_booking', "$idbooking")
                ->join('package p', 'p.id_package = b.id_package')
                ->limit(1);
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package[0];
    }
    public function thisClientBook($idclient)
    {
        $db = db_connect();
        $builder = $db->table('booking b');
        $builder->select('b.id_booking, b.id_client, b.id_package, b.lokasi, b.harga_katalog, b.diskon, b.total_akhir, b.tanggal_sesi, b.jam_sesi, b.catatan, b.status, b.create_chart, p.type_package, p.title_package, p.desc_package, p.image_package, p.note_package')
                ->where('b.id_client', "$idclient")
                ->join('package p', 'p.id_package = b.id_package')
                ->orderBy('b.id_booking', 'DESC');
        $query = $builder->get();
        $package = $query->getResultArray();
        return $package;
    }
    public function removingBooking($idclient, $idbooking)
    {
        $db = db_connect();
        $builder = $db->table('booking b');
        $builder->where('id_client', $idclient);
        $builder->where('id_booking', $idbooking);
        $builder->delete();
    }
}
