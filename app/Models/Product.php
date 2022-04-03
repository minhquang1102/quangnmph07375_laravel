<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'price',
    ];

    // public function category() {
    //     return $this->belongsTo(Category::class, 'category_id', 'id');
    // }

    public function categories() {
        return $this->belongsToMany(
            Category::class,
            'category_product',
            'product_id',
            'category_id'
        );
    }

    public function newsProducts(){
        return $this->belongsToMany(News::class,'news_product','product_id','news_id');
    }
}
