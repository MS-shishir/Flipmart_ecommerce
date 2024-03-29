<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public function parent()
    {
        return $this->belongsTo(Category::class,'is_parent');
    }
    public function category(){
        return $this->hasMany(Category::class);
    }
}
