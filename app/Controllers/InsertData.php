<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class InsertData extends BaseController
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
            $password = $data['password'];
            $phone = $data['phone'];
            $address = $data['address'];
            $level = $data['level'];
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $is_data_already = $this->user
                ->where('username', $username)->countAllResults();

            if ($is_data_already == 0) {
                $insert_data = [
                    'username'          => $username,
                    'userpassword'      => $hashed_password,
                    'userlevel'         => $level,
                    'userfullname'      => $fullname,
                    'userphonenumber'   => $phone,
                    'useraddress'       => $address,
                    'created_at'        => date('Y-m-d H:i:s'),
                    'updated_at'        => date('Y-m-d H:i:s')
                ];
                $this->db->table('tb_user')->insert($insert_data);
                $msg = [
                    'success' => 'Data Karyawan berhasil ditambahkan.'
                ];
            } else {
                $msg = [
                    'error' => "Username $username telah digunakan."
                ];
            }
        }
        echo json_encode($msg);
    }
}
