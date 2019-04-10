<?php

namespace App\Services;
use App\Services\NewsService;
use \App\Models\Article;
use \App\Models\Category;
use \App\Models\Subscriber;
use \App\Models\Publisher;

class PublisherService implements NewsService 
{
    private $model;
    public function __construct(Article $model)
    {
       // parent::__construct();
       $this->model = $model;
    }

    public function get(Array $filters = [])
    {
        return  $this->model->active()
                            ->searchFilters($filters)
                            ->get();
    }

    public function getById(Int $id)
    {
        $filters = ['publisher_id' => $id];
        return  $this->model->active()
                            ->searchFilters($filters)
                            ->first();
    }

    public function save(Array $data)
    {

    }

    public function update(Array $data)
    {

    }
    
    public function delete(Int $id)
    {

    }
}
