<?php

namespace App\Models;

use CodeIgniter\Model;

class Video extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'video';
    protected $allowedFields    = [
        'id_video',
        'title_video',
        'category_video',
        'cover_video',
        'url_video',
        'create_date',
    ];
    public function videos()
    {
        $db = db_connect();
        $builder = $db->table('video v');
        $builder->select('*');
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories;
    }
}
