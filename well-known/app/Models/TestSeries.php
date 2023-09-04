<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestSeries extends Model
{
    use HasFactory;
    protected $table = 'test_series';

    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id')->where('status', '<>', '3');
    }

    public function sub_category()
    {
        return $this->hasOne(Category::class, 'id', 'sub_category_id')->where('status', '<>', '3');
    }
    public function playlist()
    {
        return $this->hasOne(Playlist::class, 'id', 'playlist_id')->where('status', '<>', '3');
    }

    public function ques()
    {
        return $this->hasMany(TestQuestions::class, 'test_series_id', 'id')->where('status', '<>', '3');
    }
    public function subject()
    {
        return $this->hasOne(Subject::class, 'id', 'subject_id')->where('status', '<>', '3');
    }

}
