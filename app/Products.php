<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable=['name','description','size','category_id','image','price'];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class);
    }

}
