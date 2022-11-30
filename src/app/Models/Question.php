<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Question extends Model
{
    use HasFactory;
    public function getQuestions(?int $seed, array $subject_ids, ?int $random)
    {
        if (is_null($seed)) {
            $seed = rand(1, 9);
        } else {
            $seed = $seed;
        }

        $query = DB::table('questions')
            ->leftJoin('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->whereIn('subject_id', $subject_ids);
        if ($random == 1) {
            $query->inRandomOrder($seed)
                ->groupBy('questions.id');
        }
        $questions = $query->paginate(1);
        return [$questions, $seed];
    }

    public function getQuestionsForDeleteSubject(int $subject_id)
    {
        $count = DB::table('questions')
            ->where('subject_id', $subject_id)
            ->count();
        return $count;
    }

    public function getQuestionListForDashboard(int $subject_id)
    {
        $questions = DB::table('questions')
            ->select('id', 'number', 'caption')
            ->where('subject_id', $subject_id)
            ->get();
        return $questions;
    }
}
