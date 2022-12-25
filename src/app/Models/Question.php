<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Question extends Model
{
    use HasFactory;
    public function getQuestions(?int $seed, array $subject_ids, ?int $qRandom)
    {
        if (is_null($seed)) {
            $seed = rand(1, 9);
        } else {
            $seed = $seed;
        }

        $query = DB::table('questions')
            ->select('questions.id', 'questions.subject_id', 'questions.number as question_number', 'questions.caption', 'questions.caption_img', 'questions.choice1', 'questions.choice2', 'questions.choice3', 'questions.choice4', 'questions.choice5', 'questions.choice_img1', 'questions.choice_img2', 'questions.choice_img3', 'questions.choice_img4', 'questions.choice_img5', 'questions.answer', 'questions.explan', 'questions.explan_img', 'questions.inappropriate_flg', 'subjects.type', 'subjects.name', 'subjects.year', 'subjects.number as subject_number', 'subjects.harf_div')
            ->leftJoin('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->whereIn('subject_id', $subject_ids);
        if ($qRandom == 1) {
            $query->inRandomOrder($seed)
                ->groupBy('questions.id');
        }
        $questions = $query->paginate(1);
        return [$questions, $seed];
    }

    public function getQuestion(int $id)
    {
        $question = DB::table('questions')
            ->where('id', $id)
            ->get();
        return $question;
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

    public function getQuestionForCreateQuestionReq(int $subject_id, int $number)
    {
        $count = DB::table('questions')
            ->where('subject_id', $subject_id)
            ->where('number', $number)
            ->count();
        return $count;
    }

    public function createQuestion(array $columns)
    {
        $columns['created_at'] = Carbon::now();
        $columns['updated_at'] = Carbon::now();

        DB::table('questions')->insert(
            $columns
        );
    }

    public function updateQuestion(array $columns)
    {
        $id = $columns['id'];
        unset($columns['id']);
        $columns['updated_at'] = Carbon::now();
        // foreach ($columns as $key => $value) {
        //     $columns[$key] = $value;
        // }
        DB::table('questions')
            ->where('id', $id)
            ->update(
                $columns
            );
    }

    public function getDeleteImgPath(int $id, string $targetImg)
    {
        $targetImgPath = DB::table('questions')
            ->select($targetImg)
            ->where('id', $id)
            ->get();
        return $targetImgPath;
    }
}
