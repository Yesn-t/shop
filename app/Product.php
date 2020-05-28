<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'departament_id','category_id','amount','description','size'];

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

    public function files()
    {
        return $this->hasMany(File::class);
    }
}
