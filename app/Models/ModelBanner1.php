<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelBanner1 extends Model
{
    protected $table            = 'tb_banner1';
    protected $allowedFields    = [
        'tagline01,
        tagline02,
        tagline03,
        taglinedesc01,
        taglinedesc02,
        taglinedesc03'
    ];
}
