<?php

namespace App\Models;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'price','category_id','created_by', 'image_path'];

    public function category(): HasMany
    {
        return $this->hasMany(Categories::class, "id", "category_id");
    }
}
