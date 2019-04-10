<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Publisher extends Model
{

    protected $table = 'publisher';

    /**
     * Filter articles by each field
     */
    public function scopeSearchFilters($query,Array $filters = [])
    {
        if (empty($filters)) {
            return $query;
        }

        if (!empty($filters['article_id'])) {
            $query->where('id', $filters['article_id']);
        }

        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%'.$filters['title'].'%');
        }

        if (!empty($filters['description'])) {
            $query->where('description', 'like', '%'.$filters['description'].'%');
        }

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }
   
        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        if (!empty($filters['initial_date'])) {
            $query->where('publishDate', '>=', $filters['initial_date']);
        }
        
        if (!empty($filters['final_date'])) {
            $query->where('publishDate', '<=', $filters['final_date']);
        }
        
        return $query;
    }
}
