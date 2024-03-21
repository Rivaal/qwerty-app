<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelBanner1;

class PageUser extends BaseController
{
    public function __construct()
    {
        $this->banner1 = new ModelBanner1();
    }
    public function LandingPage()
    {
        $banner_content = $this->banner1->first();
        $data = [
            'content' => $banner_content
        ];
        return view('page/user/landing', $data);
    }
    public function CatalogPage()
    {
        // $banner_content = $this->banner1->first();
        // $data = [
        //     'content' => $banner_content
        // ];
        return view('page/user/catalog');
    }
}
