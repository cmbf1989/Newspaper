<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppModel extends Model
{

    public function scopeActive($query) 
    {
        return $query->whereNull($this->table.'.deleted_at');
    }
    
}
