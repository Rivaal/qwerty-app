<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class UpdateData extends BaseController
{
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->user = new ModelUser();
    }

    public function Karyawan()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();
            $fullname = $data['fullname'];
            $username = $data['username'];
            $phone = $data['phone'];
            $address = $data['address'];
            $level = $data['level'];

            $update_data = [
                'userlevel'         => $level,
                'userfullname'      => $fullname,
                'userphonenumber'   => $phone,
                'useraddress'       => $address,
                'updated_at'        => date('Y-m-d H:i:s')
            ];
            $this->db->table('tb_user')->where('username', $username)->set($update_data)->update();
            $msg = [
                'success' => 'Data Karyawan berhasil diupdate.'
            ];
        }
        echo json_encode($msg);
    }
}
