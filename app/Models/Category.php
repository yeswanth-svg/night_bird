<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['category_name'];

   public function types()
{
    // Category has many types (e.g., Men's Fashion → T-Shirts, Jeans, etc.)
    return $this->hasMany(Type::class, 'category_id', 'id');
}

}
