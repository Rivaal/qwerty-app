<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Auth extends BaseController
{
    public function loginclient()
    {
        return view('auth/auth_user');
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
    public function logoutclient()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/');
    }
}
