<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestions extends Model
{
    use HasFactory;
    protected $table = 'test_questions';

    public function options()
    {
        return $this->hasMany(TestQueOptions::class, 'question_id', 'id');
    }
}
