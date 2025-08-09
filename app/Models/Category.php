<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['category_name'];

    public function types()
    {
        return $this->hasMany(Type::class, 'category_id'); // 'dish_type_id' is the foreign key in dishes table
    }
}
