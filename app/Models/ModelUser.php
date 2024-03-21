<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelUser extends Model
{
    protected $table            = 'tb_user';
    protected $primaryKey       = 'username';
    protected $allowedFields    = [
        'username,
         userpassword, 
         userlevel, 
         userfullname,
         useraddress,
         userphonenumber'
    ];
}
