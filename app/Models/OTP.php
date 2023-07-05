<?php

namespace App\Models;

use CodeIgniter\Model;

class OTP extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'otp';
    protected $allowedFields    = [
        'idotp',
        'nowa',
        'waktu',
        'kodeotp',
    ];
}
