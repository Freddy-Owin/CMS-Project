<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'product';

    public $fillable = [
        'title', 'image', 'description', 'price', 'stock', 'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
