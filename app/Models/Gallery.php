<?php

namespace App\Models;

use CodeIgniter\Model;

class Gallery extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'gallery';
    protected $allowedFields    = [
        'id_gallery',
        'title_gallery',
        'description_gallery',
        'category_gallery',
        'cover_gallery',
        'client_gallery',
        'information_gallery',
        'create_by',
        'create_date',
    ];
    public function galleryByCategory()
    {
        $db = db_connect();
        $builder = $db->table('categories c');
        $builder->select('c.id_categories, c.title_categories, IFNULL(SUBSTRING_INDEX(GROUP_CONCAT(g.cover_gallery ORDER BY RAND()), ",", 1), "nothing.jpg") AS cover_categories', false)
            ->join('gallery g', 'FIND_IN_SET(c.id_categories, g.category_gallery)', 'left')
            ->groupBy('c.id_categories, c.title_categories');
        $query = $builder->get();
        $categories = $query->getResultArray();

        foreach ($categories as &$category) {
            $category['cover_categories'] = $category['cover_categories'] ? $category['cover_categories'] : 'default_cover.jpg';
        }
        return $categories;
    }
    public function detailGalleryByCategory($id_categories)
    {
        $db = db_connect();
        $builder = $db->table('gallery g');
        $builder->select('g.id_gallery, g.title_gallery, g.description_gallery, g.category_gallery, g.cover_gallery')
            ->where('g.category_gallery LIKE', '%'.$id_categories.'%');
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories;
    }
    public function relatedDetailGalleryByCategory($id_categories, $id_gallery)
    {
        $db = db_connect();
        $builder = $db->table('gallery g');
        $builder->select('g.id_gallery, g.title_gallery, g.description_gallery, g.category_gallery, g.cover_gallery')
            ->where('g.category_gallery LIKE', '%'.$id_categories.'%')
            ->where('g.id_gallery !=', $id_gallery);
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories;
    }
    public function detailPhoto($id_gallery)
    {
        $db = db_connect();
        $builder = $db->table('gallery g');
        $builder->select('g.id_gallery, g.title_gallery, g.description_gallery, g.category_gallery, g.cover_gallery, g.client_gallery, g.information_gallery, g.create_by, g.create_date')
                ->where('g.id_gallery LIKE', $id_gallery);
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories[0];
    }
    public function photoName($id_gallery)
    {
        $db = db_connect();
        $builder = $db->table('gallery g');
        $builder->select('g.title_gallery')
                ->where('g.id_gallery', $id_gallery)
                ->limit(1);
        $query = $builder->get();
        $categories = $query->getResultArray();
        return $categories[0]['title_gallery'];
    }
}
