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
    public function caratransaksi()
    {
        return view('user/cara_transaksi');
    }
    public function hubungikami()
    {
        return view('user/hubungi_kami');
    }
}
