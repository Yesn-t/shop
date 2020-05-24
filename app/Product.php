<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function departament()
    {
        return $this->belongsTo(Departament::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
