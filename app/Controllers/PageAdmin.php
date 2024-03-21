<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PageAdmin extends BaseController
{
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    // Dashboard
    public function dashboardRingkasanPesanan()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/dashboard/ringkasan_pesanan');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function dashboardStatistikPendapatan()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/dashboard/statistik_pendapatan');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    public function dashboardJadwalKetersediaanStudio()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/dashboard/jadwal_ketersediaan_studio');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    // Pesanan
    public function pesananDaftarPesanan()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/pesanan/daftar_pesanan');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    // Katalog
    public function katalogDaftarKatalog()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/katalog/daftar_katalog');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    // Karyawan
    public function karyawanDaftarKaryawan()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/karyawan/daftar_karyawan');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    // Client
    public function clientDaftarClient()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/client/daftar_client');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    // Kalender
    public function kalenderLihatJadwal()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/kalender/lihat_jadwal');
        } else {
            return redirect()->to(base_url(''));
        }
    }

    // Laporan
    public function laporanRingkasanKeuangan()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/laporan/ringkasan_keuangan');
        } else {
            return redirect()->to(base_url(''));
        }
    }


    // Pengaturan
    public function pengaturanPengaturanAkun()
    {
        $login = $this->session->get('login');
        if ($login) {
            return view('page/admin/pengaturan/pengaturan_akun');
        } else {
            return redirect()->to(base_url(''));
        }
    }
}
