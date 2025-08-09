<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $fillable = [
        'category_id ',
        'name',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class, 'type_id'); // 'dish_type_id' is the foreign key in dishes table
    }
}
