<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name','hash','size','mime','product_id'];
    
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
