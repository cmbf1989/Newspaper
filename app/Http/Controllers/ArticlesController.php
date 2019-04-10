<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\AppController;
use DB;
use App\Services\NewsService;

class ArticlesController extends AppController
{
    private $service;

    public function __construct(NewsService $service)
    {
       // parent::__construct();
       $this->service = $service;
    }

    /**
     * Generates View with all news data
     */
    public function news(Request $request)
    {
        $data                    = ['list_news' => null];
        $filters                 = empty($request->query()) ? [] : $request->get();
        $data['list_news']       = $this->service->get($filters);
        $data['list_categories'] = $this->service->getArticleCategories();

        return view('news', $data);
    }

    /**
     * Generates JSON for API
     */
    public function getArticles(Request $request)
    {
        $parameters = $request->query();
        $articles   = $this->service->get($parameters)
                                    ->toArray();
        return $this->successResponse($articles);
    }

    /**
     * Gets an unique article based on id
     */
    public function getArticle(Request $request, $id)
    {
        $article   = $this->service->getById($id);
        
        if (empty($article)) {
            return $this->errorResponse("Article not found.");
        }
        
        return $this->successResponse($article->toArray());
    }

        /**
     * Generates JSON for API for every category 
     */
    public function getCategories(Request $request)
    {
        $categories = $this->service->getArticleCategories()
                                    ->toArray();
        return $this->successResponse($categories);
    }

    /**
     * Generates JSON for API
     */
    public function getArticleSubscribers(Request $request,Int $id)
    {
        $filters = $request->query();
        $filters['article_id'] = $id;
        $subscribers = $this->service->getArticleSubscribers($filters)
                                     ->toArray();
        return $this->successResponse($subscribers);
    }

    public function createArticle(Request $request)
    {

    }
}
