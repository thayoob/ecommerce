<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'meta_title',
        'meta_keyword',
        'meta_description',
        'status',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
    public function relatedProducts()
    {
        return $this->hasMany(Product::class, 'category_id', 'id')->latest()->take(16);
    }
    public function brands()
    {
        return $this->hasMany(Brand::class, 'category_id', 'id')->where('status', '0');
    }
}
