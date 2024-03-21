<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Datatables extends BaseController
{
    public function __construct()
    {
        $this->user = new ModelUser();
    }
    public function tableKaryawan()
    {
        $dataKaryawan["data"] = "";
        $session = \Config\Services::session();
        $level = $session->get('level');
        if ($level == 0) {
            $dataKaryawan = $this->user
            ->select('username, userfullname, userphonenumber, useraddress, userlevel ,created_at')
            ->where('userlevel <', '3')
            ->findAll();
        } elseif ($level == 1) {
            $dataKaryawan = $this->user
            ->select('username, userfullname, userphonenumber, useraddress, userlevel ,created_at')
            ->where('userlevel >', '1')
            ->where('userlevel <', '3')
            ->findAll();
        } elseif ($level == 2) {
            $dataKaryawan = $this->user
            ->select('username, userfullname, userphonenumber, useraddress, userlevel ,created_at')
            ->where('userlevel', '2')
            ->findAll();
        }

        $json_data["data"] = $dataKaryawan;
        // echo "<pre>";
        echo json_encode($json_data);
    }
    public function tableClient()
    {
        $dataClient["data"] = "";
        $dataClient = $this->user
        ->select('username, userfullname, userphonenumber, useraddress, userlevel ,created_at')
        ->where('userlevel', '3')
        ->findAll();
        $json_data["data"] = $dataClient;
        // echo "<pre>";
        echo json_encode($json_data);
    }
}
