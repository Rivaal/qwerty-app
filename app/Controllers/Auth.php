<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function loginclient()
    {
        return view('auth/auth_user');
    }
    public function loginadmin()
    {
        return view('auth/auth_admin');
    }
    public function forgotPasswordClient()
    {
        return view('auth/auth_user_forgot');
    }
    public function sendOTP()
    {
        $data = $this->request->getPost();
        $nomorwa = $data['nowa'];
        $checkData = $this->client->where('telp_client', $nomorwa)->first();
        if (!$checkData) {
            session()->setFlashdata('error', 'Nomor whatsapp tidak terdaftar');
            return redirect()->back()->withInput();
        } else {
            if (substr($nomorwa, 0, 1) === "0") {
                $nomorwa = "62" . substr($nomorwa, 1);
            }
            $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
            $token = "iXgJ0D7hU9P6GKOADiFJnUwCilfF1DTeg94pU14GdKHpG28Mfw4zWB7UtDsArJRP";
            $payload = [
                "data" => [
                    [
                        'phone' => $nomorwa,
                        'message' => "OTP Kamu adalah $randomNumber. jangan berikan kepada siapapun termasuk pihak yang mengaku sebagai QWERTY Studio.",
                    ]
                ]
            ];

            // $result = $this->client->sendMessage($payload, $token);
            $result = '{"status": true, "message":"Text Message is pending and waiting to be processed. with error: 0"}';
            $response = json_decode($result, true); // Assuming $result contains the response JSON

            if ($response['status'] === true) {
                $this->otp->where('nowa', $nomorwa)->delete();
                $this->otp->insert([
                    'nowa' => $nomorwa,
                    'waktu' => date("Y-m-d H:i:s"),
                    'kodeotp' => $randomNumber
                ]);
                $send['nowa'] = $nomorwa;
                return view('auth/sendedOTP', $send);
            }
        }
    }
    public function verifOTP()
    {
        $otp = $this->request->getPost('otp');
        $nowa = $this->request->getPost('nowa');
        $checkOTP = $this->otp->where('kodeotp', $otp)->where('nowa', $nowa)->orderBy('waktu', 'DESC')->first();
        if ($checkOTP) {
            $waktu = $checkOTP['waktu'];
            if ($data = $this->client->isWithinFiveMinutes($waktu)) {
                $send['nowa'] = $nowa;
                return view('Auth/auth_change_password', $send);
            } else {
                $send['nowa'] = $nowa;
                session()->setFlashdata('error', 'OTP telah hangus!');
                return view('Auth/auth_user_forgot', $send);
            }
        } else {
            $send['nowa'] = $nowa;
            session()->setFlashdata('error', 'Kode salah!');
            return view('Auth/sendedOTP', $send);
        }
    }
    public function confirmPasswordChange()
    {
        $data = $this->request->getPost();
        if ($data['password'] === $data['confirmPassword']) {
            if (strlen($data['password']) < 5) {
                session()->setFlashdata('error', 'Password harus lebih dari 5 karakter!');
                return view('Auth/auth_change_password', $data);
            } else {
                if (substr($data['nowa'], 0, 2) === "62") {
                    $data['nowa'] = "0" . substr($data['nowa'], 2);
                }
                $findData = $this->client->where('telp_client', $data['nowa'])->first();
                $id_client = $findData['id_client'];
                $this->client->where('id_client', $id_client)->set('password', password_hash($data['password'], PASSWORD_DEFAULT))->update();
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('error', 'Password dan Konfirmasi Password Tidak Sama!');
            return view('Auth/auth_change_password', $data);
        }
    }
    public function logincheckclient()
    {
        $data['phone'] = $this->request->getVar('login-form-phone');
        $data['password'] = $this->request->getVar('login-form-password');

        $client = $this->client->where('telp_client', $data['phone'])->first();
        if ($client) {
            if (password_verify($data['password'], $client['password'])) {
                session()->set([
                    'client_id' => $client['id_client'],
                    'client_username' => $client['username'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('/');
            } else {
                return redirect()->to('/login')->with('errorlogin', 'Nomor Whatsapp atau Password Salah!');
            }
        } else {
            return redirect()->to('/login')->with('errorlogin', 'Nomor Whatsapp atau Password Salah!');
        }
        // print_r($password_verified);
    }
    public function logincheckadmin()
    {
        $data['username'] = $this->request->getPost("username");
        $data['password'] = $this->request->getPost("password");

        $admin = $this->admin->where('username', $data['username'])->first();
        if ($admin) {
            if (password_verify($data['password'], $admin['password'])) {
                session()->set([
                    'admin_id' => $admin['id_admin'],
                    'admin_username' => $admin['username'],
                    'admin_fullname' => $admin['nama_admin'],
                    'isLoggedIn' => true
                ]);
                return redirect()->to('Admin');
            } else {
                return redirect()->to('/Auth')->with('errorlogin', 'Username atau Password Salah!');
            }
        } else {
            return redirect()->to('/Auth')->with('errorlogin', 'Username atau Password Salah!');
        }
    }
    public function logoutclient()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
    public function logoutadmin()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('Auth');
    }
    public function registrationUser()
    {
        $data = $this->request->getPost();
        if ($data['rpassword'] === $data['rconfirmpassword']) {
            if (strlen($data['rnowa']) < 12 || strlen($data['rnowa']) > 12) {
                return redirect()->to('/login')->with('errorlogin', 'Gunakan nomor whatsapp dengan 12 angka');
            } else {
                if (substr($data['rnowa'], 0, 2) === "08") {
                    $nomorwa = $data['rnowa'];
                    if (substr($nomorwa, 0, 1) === "0") {
                        $nomorwa = "62" . substr($nomorwa, 1);
                    }
                    $randomNumber = str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
                    $token = "iXgJ0D7hU9P6GKOADiFJnUwCilfF1DTeg94pU14GdKHpG28Mfw4zWB7UtDsArJRP";
                    $payload = [
                        "data" => [
                            [
                                'phone' => $nomorwa,
                                'message' => "OTP Kamu adalah $randomNumber. jangan berikan kepada siapapun termasuk pihak yang mengaku sebagai QWERTY Studio.",
                            ]
                        ]
                    ];

                    // $result = $this->client->sendMessage($payload, $token);
                    $result = '{"status": true, "message":"Text Message is pending and waiting to be processed. with error: 0"}';
                    $response = json_decode($result, true); // Assuming $result contains the response JSON

                    if ($response['status'] === true) {
                        $this->otp->where('nowa', $nomorwa)->delete();
                        $this->otp->insert([
                            'nowa' => $nomorwa,
                            'waktu' => date("Y-m-d H:i:s"),
                            'kodeotp' => $randomNumber
                        ]);
                        $data['rnowa'] = $nomorwa;
                        return view('auth/auth_registration_otp', $data);
                    }
                } else {
                    return redirect()->to('/login')->with('errorlogin', 'Nomor Whatsapp harus diawali 08XXXXXXXXXX');
                }
            }
        } else {
            return redirect()->to('/login')->with('errorlogin', 'Password dan Konfirmasi Password Registrasi tidak sama!');
        }
    }
    public function registrationVerifOTP()
    {
        $otp = $this->request->getPost('otp');
        $nowa = $this->request->getPost('rnowa');
        $data = $this->request->getPost();
        $checkOTP = $this->otp->where('kodeotp', $otp)->where('nowa', $nowa)->orderBy('waktu', 'DESC')->first();
        if ($checkOTP) {
            $waktu = $checkOTP['waktu'];
            if ($this->client->isWithinFiveMinutes($waktu)) {
                $lastData = $this->client->orderBy('id_client', 'DESC')->first();
                $lastId = $lastData['id_client'];
                $numericPart = substr($lastId, 3);
                $incrementedNumericPart = intval($numericPart) + 1;
                $paddedNumericPart = str_pad($incrementedNumericPart, strlen($numericPart), "0", STR_PAD_LEFT);
                $incrementedData = substr($lastId, 0, 3) . $paddedNumericPart;
                $save = [
                        'idclient' => $incrementedData,
                        'nama_client' => $data['rnamalengkap'],
                        'telp_client' => $data['rnowa'],
                        'alamat_client' => $data['ralamat'],
                        'username' => $data['rusername'],
                        'password' => $data['rpassword']
                ];
            } else {
                session()->setFlashdata('error', 'OTP telah hangus!');
                return redirect()->to('login');
            }
        } else {
            session()->setFlashdata('error', 'Kode salah!');
            return view('Auth/auth_registration_otp', $data);
        }
    }
}
