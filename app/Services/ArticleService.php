<?php

namespace App\Services;
use App\Services\NewsService;
use \App\Models\Article;
use \App\Models\Category;
use \App\Models\Subscriber;

class ArticleService implements NewsService 
{
    private $model;
    public function __construct(Article $model)
    {
       // parent::__construct();
       $this->model = $model;
    }

    public function get(Array $filters = [])
    {
        return  $this->model->searchFilters($filters)
                            ->active()
                            ->get();
    }

    public function getById(Int $id)
    {
        $filters = ['article_id' => $id];
        return  $this->model->active()
                            ->searchFilters($filters)
                            ->first();
    }

    public function getArticleCategories()
    {
        return Category::active()->get();
    }

    public function getArticleSubscribers(Array $filters = [])
    {
        $subscriber = new Subscriber();
        return $subscriber->selectBaseFields()
                          ->active()
                          ->withArticles()
                          ->searchFilters($filters)
                          ->get();    
    }


    public function save(Array $data)
    {
        $article = Article::create($data);
        $response =  ['success' => false, 'article' => null];
        
        if ($article == null || !$article->exists()) {
            return $response;
        }
        $response['success'] = true;
        $response['article'] = $article;
        return $response;
    }

    public function update(Array $data)
    {
        $response = ['article' => null, 'success' => false];
        $success = Article::active()->where('id', $data['id'])
                                    ->update($data);
        
        if ($success) {
            $response['success'] = true;
            $response['article'] = Article::active()->find($data['id']);
        }

        return $response;
    }
    
    public function delete(Int $id)
    {

    }
}
