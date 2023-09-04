<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQueOptions extends Model
{
    use HasFactory;
    protected $table = 'test_question_options';
    protected $fillable = array('*');
    protected $guarded = [];
}
