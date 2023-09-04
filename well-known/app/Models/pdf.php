<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pdf extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->where('status', '<>', '3');
    }

    public function sub_category()
    {
        return $this->hasOne(Category::class, 'id', 'sub_category_id')->where('status', '<>', '3');
    }
}
