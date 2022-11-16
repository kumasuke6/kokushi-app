<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Question extends Model
{
    use HasFactory;
    public function getQuestions($request){
        $query = DB::table('questions')
            ->leftJoin('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->whereIn('subject_id',$request->ids);
        if($request->random == '1'){
            if (is_null($request->seed)){
                $seed = rand(1,9);
            } else {
                $seed = $request->seed;
            }

            $query->inRandomOrder($seed)
                ->groupBy('questions.id');
        }
        $questions = $query->paginate(1);
        return [$questions, $seed];
    }
}
