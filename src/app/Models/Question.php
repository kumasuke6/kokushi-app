<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Question extends Model
{
    use HasFactory;
    public function getQuestions(){
        $questions = DB::table('questions')
            ->paginate(1);
        return $questions;
    }
}
