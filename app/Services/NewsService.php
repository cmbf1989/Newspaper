<?php

namespace App\Services;

use Illuminate\Support\ServiceProvider;

interface NewsService
{
    public function get(Array $filters);
    public function getById(Int $id);
    public function save(Array $data);
    public function update(Array $data);
    public function delete(Int $id);
}
