<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'name', 
        'description',
        'category_id'
    ];

    public function categoryNews()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function newsProducts(){
        return $this->belongsToMany(Product::class,'news_product','news_id','product_id');
    }
}
