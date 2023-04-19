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
        $data = [
            'content' => $banner_content
        ];
        return view('user/home', $data);
    }
    public function galeri()
    {
        // echo "<pre>";
        $data['categories'] = $this->gallery->galleryByCategory();
        // print_r($data);
        return view('user/galeri', $data);
    }
    public function detailgaleri($id)
    {
        // echo "<pre>";
        $categoriesName = $this->categories->categoriesName($id);
        $data['categories_name'] = $categoriesName;
        $data['detail'] = $this->gallery->detailGalleryByCategory($id);
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
        // print_r($data);
        return view('user/video', $data);
    }
    public function katalog()
    {
        return view('user/katalog');
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
            return view('user/katalogdetail', $data);
        } elseif ($type == "Outdoor") {
            $package = $this->package->outdoorPackage();

            // echo "<pre>";
            // print_r($package);
            $data = [
                'id' => $type,
                'package' => $package
            ];
            return view('user/katalogdetail', $data);
        }
    }
    public function katalogsearch($search)
    {
        $data['package'] = $this->package->searchPackage($search);
        $data['id'] = $search;
        // echo "<pre>";
        // print_r($data);
        return view('user/katalogsearch', $data);
    }
    public function singledetail($id)
    {
        if ($this->session->has('isLoggedIn')) {
            $data['package'] = $this->detailpackage->singleDetail($id);
            $data['other'] = $this->detailpackage->otherPackage($id);
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
        return view('user/packagesdetail', $package);
    }
    public function hubungikami()
    {
        return view('user/hubungi_kami');
    }
}
