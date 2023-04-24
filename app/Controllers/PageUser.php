<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Banner1;
use Intervention\Image\ImageManagerStatic as Image;

class PageUser extends BaseController
{
    public function home()
    {
        $banner_content = $this->banner1->first();
        $data['content'] = $banner_content;
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        return view('user/home', $data);
    }
    public function galeri()
    {
        // echo "<pre>";
        $data['categories'] = $this->gallery->galleryByCategory();
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        // print_r($data);
        return view('user/galeri', $data);
    }
    public function detailgaleri($id)
    {
        // echo "<pre>";
        $categoriesName = $this->categories->categoriesName($id);
        $data['categories_name'] = $categoriesName;
        $data['detail'] = $this->gallery->detailGalleryByCategory($id);
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        // print_r($data);
        return view('user/detailgaleri', $data);
    }
    public function detailfoto($id)
    {
        if ($this->session->has('isLoggedIn')) {
            // echo "<pre>";
            $data['photo_name'] = $this->gallery->photoName($id);
            $data['detail'] = $this->gallery->detailPhoto($id);
            $categoriesId = $data['detail']['category_gallery'];
            $categoriesIdBatch = explode(',', $categoriesId);
            $fixedCategoriesId = $categoriesIdBatch[array_rand($categoriesIdBatch)];
            $data['categories_name'] = $this->categories->categoriesName($fixedCategoriesId);
            $data['related_detail'] = $this->gallery->relatedDetailGalleryByCategory($fixedCategoriesId, $id);
            $client_id = $this->session->get('client_id');
            $data['chart'] = $this->chart->thisClientChart($client_id);
            $data['booking'] = $this->booking->thisClientBook($client_id);
            $data['countbooking'] = count($data['booking']);
            $data['countchart'] = count($data['chart']);
            // print_r($fixedCategoriesId);
            return view('user/detailfoto', $data);
        } else {
            return redirect()->to('login');
        }
    }
    public function video()
    {
        // echo "<pre>";
        $data['detail'] = $this->video->videos();
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        // print_r($data);
        return view('user/video', $data);
    }
    public function katalog()
    {
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        return view('user/katalog', $data);
    }
    public function katalogdetail($type)
    {
        if ($type == "Indoor") {
            $package = $this->package->indoorPackage();

            // echo "<pre>";
            // print_r($package);
            $data = [
                'id' => $type,
                'package' => $package
            ];
            $client_id = $this->session->get('client_id');
            $data['chart'] = $this->chart->thisClientChart($client_id);
            $data['booking'] = $this->booking->thisClientBook($client_id);
            $data['countbooking'] = count($data['booking']);
            $data['countchart'] = count($data['chart']);
            return view('user/katalogdetail', $data);
        } elseif ($type == "Outdoor") {
            $package = $this->package->outdoorPackage();

            // echo "<pre>";
            // print_r($package);
            $data = [
                'id' => $type,
                'package' => $package
            ];
            $client_id = $this->session->get('client_id');
            $data['chart'] = $this->chart->thisClientChart($client_id);
            $data['booking'] = $this->booking->thisClientBook($client_id);
            $data['countbooking'] = count($data['booking']);
            $data['countchart'] = count($data['chart']);
            return view('user/katalogdetail', $data);
        }
    }
    public function katalogsearch($search)
    {
        $data['package'] = $this->package->searchPackage($search);
        $data['id'] = $search;
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        // echo "<pre>";
        // print_r($data);
        return view('user/katalogsearch', $data);
    }
    public function singledetail($id)
    {
        if ($this->session->has('isLoggedIn')) {
            $idclient = $this->session->get('client_id');
            $data['package'] = $this->detailpackage->singleDetail($id);
            $data['other'] = $this->detailpackage->otherPackage($id);
            $data['cart'] = $this->chart->findChart($id, $idclient);
            $client_id = $this->session->get('client_id');
            $data['chart'] = $this->chart->thisClientChart($client_id);
            $data['booking'] = $this->booking->thisClientBook($client_id);
            $data['countbooking'] = count($data['booking']);
            $data['countchart'] = count($data['chart']);
            // echo "<pre>";
            // print_r($data);
            return view('user/singledetail', $data);
        } else {
            return redirect()->to('login');
        }
    }
    public function packagedetail($id)
    {
        $package = $this->package->detailPackage($id);
        $idclient = $this->session->get('client_id');
        $client_id = $this->session->get('client_id');
        $package['chart'] = $this->chart->thisClientChart($client_id);
        $package['cart'] = $this->chart->findChart($id, $idclient);
        $package['countchart'] = count($package['chart']);
        return view('user/packagesdetail', $package);
    }
    public function keranjangasaya()
    {
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        return view('user/keranjang', $data);
    }
    public function listbooking()
    {
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);

        // echo "<pre>";
        // print_r($data);
        return view('user/listbooking', $data);
    }
    public function tambahkeranjang($idpackage)
    {
        $idclient = $this->session->get('client_id');

        // GetId
        $lastChart = $this->chart->getLastData();
        $prefix = substr($lastChart, 0, 2); // get the prefix "PIND"
        $oldNumber = intval(substr($lastChart, 4)); // get the current number 002
        $newNumber = $oldNumber + 1; // increment the number
        $newValue = $prefix . '-' . sprintf('%03d', $newNumber);

        $this->chart->addingChart($newValue, $idclient, $idpackage);
        return redirect()->to("singledetail/$idpackage");
    }
    public function hapuskeranjang($idpackage)
    {
        $idclient = $this->session->get('client_id');
        $this->chart->removingChart($idclient, $idpackage);
        return redirect()->to("keranjang");
    }
    public function hapusbooking($idbooking)
    {
        $idclient = $this->session->get('client_id');
        $this->booking->removingBooking($idclient, $idbooking);
        return redirect()->to("listbooking");
    }
    public function booking($idpackage)
    {
        if ($this->session->has('isLoggedIn')) {
            $client_id = $this->session->get('client_id');
            $data['package'] = $this->package->detailPackage($idpackage);
            $data['client'] = $this->client->clientDetail($client_id);
            $data['chart'] = $this->chart->thisClientChart($client_id);
            $data['booking'] = $this->booking->thisClientBook($client_id);
            $data['countbooking'] = count($data['booking']);
            $data['countchart'] = count($data['chart']);
            $prefix = substr($idpackage, 1, 3);
            // echo "<pre>";
            // print_r($data);
            if ($prefix == "IND") {
                return view('user/bookingindoor', $data);
            } elseif ($prefix == "OUT") {
                return view('user/bookingoutdoor', $data);
            }
        } else {
            return redirect()->to('login');
        }
    }
    public function prosesbooking($type)
    {
        if ($this->request->isAJAX()) {
            if ($type == "IND") {
                $idclient = $this->session->get('client_id');
                $idpackage = $this->request->getPost('id_cart');
                $data['client'] = $this->client->clientDetail($idclient);
                $data['chart'] = $this->package->detailPackage($idpackage);

                $tanggalsesi = $this->request->getPost('tanggal_sesi');
                $jamsesi = $this->request->getPost('jam_sesi');
                $catatan = $this->request->getPost('catatan');

                // getId
                $lastChart = $this->booking->getLastData();
                $prefix = substr($lastChart, 0, 2); // get the prefix "PIND"
                $oldNumber = intval(substr($lastChart, 4)); // get the current number 002
                $newNumber = $oldNumber + 1; // increment the number
                $newValue = $prefix . '-' . sprintf('%03d', $newNumber);

                $insert = [
                    'id_booking' => $newValue,
                    'id_client' => $idclient,
                    'id_package' => $idpackage,
                    'lokasi' => "QWERTY Studios",
                    'harga_katalog' => $data['chart']['price_init_package'],
                    'diskon' => $data['chart']['disc_package'],
                    'total_akhir' => $data['chart']['price_last_package'],
                    'tanggal_sesi' => $tanggalsesi,
                    'jam_sesi' => $jamsesi,
                    'catatan' => $catatan,
                    'status' => 'Belum dibayar',
                    'create_chart' => date('Y-m-d H:i:s'),
                ];
                $this->booking->insert($insert);
                $hasChart = $this->chart->findChart($idpackage, $idclient);
                if ($hasChart) {
                    $this->chart->where('id_package', $idpackage)->delete();
                }
                $msg['success'] = "$newValue";
            }
        }
        echo json_encode($msg);
    }
    public function infopembayaran($idbooking)
    {
        if ($this->session->has('isLoggedIn')) {
            $client_id = $this->session->get('client_id');
            $data['booking'] = $this->booking->detailBook($idbooking);
            $data['bookingall'] = $this->booking->thisClientBook($client_id);
            $data['chart'] = $this->chart->thisClientChart($client_id);
            $data['countbooking'] = count($data['bookingall']);
            $data['countchart'] = count($data['chart']);

            $date = $data['booking']['tanggal_sesi'];
            $dateParts = explode('/', $date);

            $data['month'] = $dateParts[0];
            $data['day'] = $dateParts[1];
            $data['year'] = $dateParts[2];

            $data['lunas'] = $data['booking']['total_akhir'];
            $data['dp'] = ($data['booking']['total_akhir'] * (50/100));

            // echo "<pre>";
            // print_r($data);
            return view('user/infopembayaran', $data);
        } else {
            return redirect()->to('login');
        }
    }
    public function hubungikami()
    {
        $client_id = $this->session->get('client_id');
        $data['chart'] = $this->chart->thisClientChart($client_id);
        $data['booking'] = $this->booking->thisClientBook($client_id);
        $data['countbooking'] = count($data['booking']);
        $data['countchart'] = count($data['chart']);
        return view('user/hubungi_kami', $data);
    }
}
