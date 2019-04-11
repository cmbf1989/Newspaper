<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Repository

This is a Newspaper repository, with some REST API features and a simple search page. The page was created just to serve as a test for the endpoints for the API.

## Search Page

While running on a local Apache server, the search page can be found in:

- http://localhost/newspaper/public/news


## Endpoints

Base API URL : http://localhost/newspaper/api/

- *GET* **article subscribers**: *articles/{id}/subscribers*
- *GET* **article categories**: *articles/categories*
- *GET* **article by id**: *articles/{id}*
- *GET* **all articles**: *articles*
- *POST* **create article**: *articles/{id}*
- *PUT* **create article**: *articles/{id}*

## Example Article creation

Run command on Terminal: ``php artisan serve`` 

- **Address** (*POST*): **http://localhost:8000/api/article**
- **Headers**: *Content-Type - application/json*
- **Request Body** (raw): 
```
{ 
    "name" : "Article PotX", 
    "publisher_id" : 23, 
    "state_id" : 1, 
    "category_id" : 3 
}
```
Will generate a response:
```
{
    "version": "1.0.0",
    "datetime": "2019-04-10 11:04:30",
    "success": true,
    "data": {
        "name": "Article ABC",
        "publisher_id": 23,
        "state_id": 1,
        "category_id": 3,
        "updated_at": "2019-04-10 23:47:30",
        "created_at": "2019-04-10 23:47:30",
        "id": 114
    }
}
```

## Example Article update (ex. id - 25)

Run command on Terminal: ``php artisan serve`` 

- **Address** (*PUT*): **http://localhost:8000/api/article/25**~
- **Headers**: *Content-Type - application/json*
- **Request Body** (raw): 
```
{ 
    "name" : "Article DEF", 
    "publisher_id" : 23, 
    "state_id" : 1, 
    "category_id" : 3 
}
```
Will generate a response:
```
{
    "version": "1.0.0",
    "datetime": "2019-04-10 11:04:02",
    "success": true,
    "data": {
        "id": 25,
        "publisher_id": 23,
        "category_id": 3,
        "state_id": 1,
        "name": "Article DEF",
        "title": "dapibus gravida. Aliquam",
        "description": "tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque scelerisque dui. Suspendisse ac metus vitae velit egestas lacinia. Sed congue, elit sed consequat auctor, nunc nulla vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Etiam laoreet, libero et tristique pellentesque, tellus sem mollis dui, in sodales elit erat vitae risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris ipsum porta elit, a feugiat tellus lorem eu metus. In lorem. Donec elementum, lorem ut aliquam iaculis, lacus pede sagittis augue, eu tempor erat neque non quam. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Aliquam fringilla cursus purus. Nullam scelerisque neque sed sem egestas blandit. Nam nulla magna, malesuada vel, convallis in, cursus et, eros. Proin ultrices. Duis",
        "url": "https://loremflickr.com/320/240?random=25",
        "publishDate": "2020-01-25 04:52:12",
        "created_at": "2019-04-11 00:50:02",
        "updated_at": "2019-04-10 23:50:02",
        "deleted_at": null
    }
}
```