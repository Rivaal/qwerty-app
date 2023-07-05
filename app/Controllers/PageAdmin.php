<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class PageAdmin extends BaseController
{
    public function dashboardRingkasanPesanan()
    {
        return view('admin/dashboard/ringkasan_pesanan');
    }
    public function dashboardStatistikPendapatan()
    {
        return view('admin/dashboard/statistik_pendapatan');
    }

    public function dashboardJadwalKetersediaanStudio()
    {
        return view('admin/dashboard/jadwal_ketersediaan_studio');
    }

    // Pesanan
    public function pesananDaftarPesanan()
    {
        return view('admin/pesanan/daftar_pesanan');
    }

    // Katalog
    public function katalogDaftarKatalog()
    {
        return view('admin/katalog/daftar_katalog');
    }

    public function income()
    {
        if ($this->session->has('isLoggedIn')) {
            $data['income'] = $this->income->getAllData();
            return view('admin/laporan/income', $data);
        } else {
            return redirect()->to('Auth');
        }
    }

    public function saveIncome()
    {
        if ($this->session->has('isLoggedIn')) {
            $lastIncome = $this->income->getLastData();
            $prefix = substr($lastIncome, 0, 2); // get the prefix "PIND"
            $oldNumber = intval(substr($lastIncome, 4)); // get the current number 002
            $newNumber = $oldNumber + 1; // increment the number
            $newValue = $prefix . '-' . sprintf('%03d', $newNumber);

            $data = $this->request->getPost();
            $this->income->addingIncome($newValue, $data['nominal'], $data['type'], $data['keterangan'], $data['aktor'], $data['tanggal']);
            $msg['success'] = "$data[tanggal]";
        } else {
            $msg['error'] = "expiry";
        }
        echo json_encode($msg);
    }

    public function updateIncome()
    {
        if ($this->session->has('isLoggedIn')) {
            $data = $this->request->getPost();
            $this->income
                    ->set('income_nominal', $data['nom'])
                    ->set('income_type', $data['type'])
                    ->set('income_desc', $data['desc'])
                    ->set('income_actor', $data['actor'])
                    ->set('income_created', $data['tgl'])
                    ->where('income_id', $data['id'])
                    ->update();
            $msg['success'] = "$data[tgl]";
        } else {
            $msg['error'] = "expiry";
        }
        echo json_encode($msg);
    }

    public function deleteIncome($id)
    {
        if ($this->session->has('isLoggedIn')) {
            $this->income->where('income_id', $id)->delete();
            $msg['success'] = "Data Telah dihapus";
        } else {
            $msg['error'] = "expiry";
        }
        echo json_encode($msg);
    }

    public function outcome()
    {
        return view('admin/laporan/outcome');
    }

    public function saveOutcome()
    {
        if ($this->session->has('isLoggedIn')) {
            $lastOutcome = $this->outcome->getLastData();
            $prefix = substr($lastOutcome, 0, 2); // get the prefix "PIND"
            $oldNumber = intval(substr($lastOutcome, 4)); // get the current number 002
            $newNumber = $oldNumber + 1; // increment the number
            $newValue = $prefix . '-' . sprintf('%03d', $newNumber);

            $data = $this->request->getPost();
            $this->outcome->addingOutcome($newValue, $data['nominal'], $data['type'], $data['keterangan'], $data['aktor'], $data['tanggal']);
            $msg['success'] = "$data[tanggal]";
        } else {
            $msg['error'] = "expiry";
        }
        echo json_encode($msg);
    }

    public function updateOutcome()
    {
        if ($this->session->has('isLoggedIn')) {
            $data = $this->request->getPost();
            $this->outcome
                    ->set('outcome_nominal', $data['nom'])
                    ->set('outcome_desc', $data['desc'])
                    ->set('outcome_actor', $data['actor'])
                    ->set('outcome_created', $data['tgl'])
                    ->where('outcome_id', $data['id'])
                    ->update();
            $msg['success'] = "$data[tgl]";
        } else {
            $msg['error'] = "expiry";
        }
        echo json_encode($msg);
    }

    public function deleteOutcome($id)
    {
        if ($this->session->has('isLoggedIn')) {
            $this->outcome->where('outcome_id', $id)->delete();
            $msg['success'] = "Data Telah dihapus";
        } else {
            $msg['error'] = "expiry";
        }
        echo json_encode($msg);
    }

    public function laporanRingkasanKeuangan()
    {
        if ($this->session->has('isLoggedIn')) {
            return view('admin/laporan/ringkasan_keuangan');
        } else {
            return redirect()->to('Auth');
        }
    }
}
