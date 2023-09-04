<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'orders';

    public function test_series()
    {
        return $this->hasOne(TestSeries::class, 'id', 'product_id')->where('status', '<>', '3');
    }

    public function playlist()
    {
        return $this->hasOne(Playlist::class, 'id', 'product_id')->where('status', '<>', '3');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id')->where('status', '<>', '3');
    }

}

