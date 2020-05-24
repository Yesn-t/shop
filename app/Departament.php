<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
