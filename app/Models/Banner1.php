<?php

namespace App\Models;

use CodeIgniter\Model;

class Banner1 extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'banner1';
    protected $allowedFields    = [
        'tagline01',
        'tagline02',
        'tagline03',
        'taglinedesc01',
        'taglinedesc02',
        'taglinedesc03',
    ];
}
