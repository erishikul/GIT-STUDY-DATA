<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
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
    public function tests()
    {
        return $this->hasMany(TestSeries::class, 'playlist_id', 'id')->where('status', '<>', '3');
    }

    // public function ques()
    // {
    //     return $this->hasMany(TestQuestions::class, 'test_series_id', 'id')->where('status', '<>', '3');
    // }
}
