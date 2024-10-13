<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'user_id',

    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship to Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function collections()
    {
        return $this->belongsToMany(Collection::class, 'collection_items', 'product_id', 'collection_id');
    }
}
