<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Question extends Model
{
    use HasFactory;
    public function getQuestions($request){
        $questions = DB::table('questions')
            ->leftJoin('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->whereIn('subject_id',$request->ids)
            ->paginate(1);
        return $questions;
    }
}
