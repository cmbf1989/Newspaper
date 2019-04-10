@extends('layouts.main')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#">NewsPaper</a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>

  </div>
</nav>
    
   <div class="album text-muted">
        <div class="container margin-top-20">
            <form id="news-search" method="" >
                <div class="gray-theme ">
                    <div class="margin-10">
                        <div class="row">
                            <div class="col-12">
                                <h5 class="text-center font-weight-bold">News Search Filters</h5>
                            </div>
                        </div>
                        <div class="form-group row margin-top-20">
                            <label for="inputTitle" class="col-3 col-form-label font-weight-bold ">Title</label>
                            <div class="col-9">
                                <input type="title" class="form-control" id = "article_title" placeholder="Search by title">
                            </div>
                        </div>
                        <div class="form-group row " >
                            <label for="inputTitle" class="col-3 col-form-label font-weight-bold ">Category:</label>
                            <div class="col-9">
                                <select class=" form-control form-control-sm" id ="article_category">
                                <option value="">All</option>
                                    @foreach ($list_categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row " >
                            <label for="inputTitle" class="col-3 col-form-label font-weight-bold ">Date:</label>
                            <div class="col-4">
                                <input class="form-control" type="datetime-local" value="" id="search_date_initial">
                            </div>

                            <label class="col-1 col-form-label font-weight-bold">until</label>

                            <div class="col-4">                     
                               <input class="form-control" type="datetime-local" value="" id="search_date_end">
                            </div>
                        </div>
                        <div class="form-group row " >
                            <div class="col-2 offset-10">
                                <input class="btn btn-dark " onclick="searchArticles();" style="float:right;" type="button" name="Search" value="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gray-theme">
                    <div id="list_news" class="row list_news" >

                        @foreach ($list_news as $article)
                            <div class="col-4 ">
                                <div class="card margin-10">
                                    <div class="card-body">
                                        <h5 class="card-title title">{{$article->title}}</h5>
                                        <img class="card-img-bottom url" src="{{$article->url}}" alt="Card image cap">
                                        <p class="card-text description">{{$article->description}}</p>
                                        <p class="card-text updated"><small class="text-muted">At {{$article->publishDate}}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
           </form>
        </div>
   </div>
   <style>
    .margin-top-20 {
        margin-top: 20px;
    }
    .margin-10 {
        margin: 10px;
    }

    .gray-theme {
        padding-top: 10px;
        margin:10px 0px 10px 0px;
        padding-bottom:10px;
        background-color: #E0E0E0;
        border-color: #000000;
        border-radius: .25rem;
    }

   </style>
   <script type="text/javascript">
    
    async function searchArticles() {
        let newsComponent =  new NewsComponent();
        let list_news = document.getElementById("list_news");
        let filters = {
            title : document.getElementById('article_title').value,
            initial_date : document.getElementById('search_date_initial').value,
            final_date : document.getElementById('search_date_end').value,
            category_id : document.getElementById('article_category').value,
        }
        console.log(filters);
        let responseRaw = await newsComponent.getNews(filters);
        let response = await responseRaw.json();


        if (response != null && response.success) {
            list_news.innerHTML = '';
            let articles = response.data;
            articles.map(elem => {
                let card = new ArticleCard(4, elem);
                list_news.appendChild(card.buildHtml());
            });
        }
    }

   </script>
@endsection
