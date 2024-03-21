<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelUser;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->user = new ModelUser();
        $this->session = \Config\Services::session();
    }
    public function login()
    {
        return view('auth/loginIndex');
    }

    public function forgotPassword()
    {
        return view('auth/forgotPassword');
    }

    public function checkUser()
    {
        if ($this->request->isAJAX()) {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            if ($username == null || $password == null) {
                // Username Password Kosong
                $msg = [
                    'usernamepassword' => 'Username atau password tidak boleh kosong.'
                ];
            } else {
                $hasData = $this->user->where('username', $username)->findAll();
                $account = $this->user->where('username', $username)->first();
                if (count($hasData) == 0) {
                    // Username tidak ditemukan
                    $msg = [
                        'username' => 'Username tidak ditemukan.'
                    ];
                } elseif (count($hasData) > 1) {
                    // Username lebih dari 2
                    $msg = [
                        'username' => 'Terdapat kesalahan pada akun.'
                    ];
                } else {
                    $stored_password = $account['userpassword'];
                    $is_password_correct = password_verify($password, $stored_password);
                    if (!$is_password_correct) {
                        // Password salah
                        $msg = [
                            'password' => 'Username atau password salah.'
                        ];
                    } else {
                        $stored_level = $account['userlevel'];

                        // 0 = Headmaster
                        // 1 = Administrator
                        // 2 = Normal Admin
                        // 3 = User

                        if ($stored_level < 3) {
                            // Admin
                            $msg = [
                                'location' => base_url('Admin/')
                            ];

                            $username       =$account['username'];
                            $level          =$account['userlevel'];
                            $fullname       =$account['userfullname'];
                            $phonenumber    =$account['userphonenumber'];

                            $new_session = [
                                'login'         => true,
                                'username'      => $username,
                                'level'         => $level,
                                'fullname'      => $fullname,
                                'phonenumber'   => $phonenumber
                            ];

                            $this->session->set($new_session);
                        } elseif ($stored_level == 3) {
                            // User
                            $msg = [
                                'location' => base_url('User/Dashboard')
                            ];
                        }
                    }
                }
            }

            echo json_encode($msg);
        } else {
            return view('notauth/index');
        }
    }

    public function checkPassword($password)
    {
        if ($this->request->isAJAX()) {
            $username = $this->session->get('username');
            $dataUser = $this->user
                ->where('username', $username)
                ->first();
            $stored_password = $dataUser['userpassword'];
            $is_password_correct = password_verify($password, $stored_password);
            if ($is_password_correct) {
                $msg = [
                    'password' => 1
                ];
            } else {
                $msg = [
                    'password' => 0
                ];
            }
            echo json_encode($msg);
        }
    }

    public function logout()
    {
        $this->session->destroy();
        return redirect()->to(base_url('Auth/Login'));
    }
}
