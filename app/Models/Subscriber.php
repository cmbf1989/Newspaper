<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AppModel;

class Subscriber extends AppModel
{
    protected $table = 'subscriber';

    public function scopeSelectBaseFields($query)
    {
        return $query->select('subscriber.*');
    }

    /**
     * Method scope for search filters
     */
    public function scopeSearchFilters($query, $filters = []) {

        if (empty($filters)) {
            return $query;
        }

        if (!empty($filters['article_id'])) {
            $query->where('art.id', $filters['article_id']);
        }

        if (!empty($filters['subscriber_name'])) {
            $query->where('subscriber.name','like', '%'.$filters['subscriber_name'].'%');
        }

        return $query;
    }

    /**
     * Scope method to bring articles from subscribers
     */
    public function scopeWithArticles($query)
    {
        return $query->join('article_has_subscriber as ahs', 'ahs.subscriber_id', '=', 'subscriber.id')
                     ->join('article as art', 'art.id', '=', 'ahs.article_id')
                     ->whereNull('art.deleted_at')
                     ->whereNull('ahs.deleted_at');
    }
}
