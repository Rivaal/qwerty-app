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
    public function sendMessage($payload, $token)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: $token",
            "Content-Type: application/json"
        ));
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($payload));
        curl_setopt($curl, CURLOPT_URL, "https://jogja.wablas.com/api/v2/send-message");
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);

        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }
    public function isWithinFiveMinutes($specificDate)
    {
        $specificTimestamp = strtotime($specificDate);
        $currentTimestamp = time();

        $difference = $specificTimestamp - $currentTimestamp;

        if ($difference <= -300) {
            return false;
        } else {
            return true;
        }
    }
}
