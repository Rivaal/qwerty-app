<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'categories';
    protected $allowedFields    = [
        'id_categories',
        'title_categories',
        'create_categories'
    ];

    public function categoriesName($id_categories)
    {
        $db = db_connect();
        $builder = $db->table('categories c');
        $builder->select('c.title_categories')
                ->where('c.id_categories LIKE', '%'.$id_categories.'%')
                ->limit(1);
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories[0]['title_categories'];
    }
}
