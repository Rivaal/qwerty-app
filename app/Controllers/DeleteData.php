<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class DeleteData extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->user = new ModelUser();
    }

    public function Karyawan($id)
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getPost('username');
            $this->db->table('tb_user')->where('username', $username)->delete();
            $msg['success'] = "Data $username berhasil dihapus.";
        }
        echo json_encode($msg);
    }
}