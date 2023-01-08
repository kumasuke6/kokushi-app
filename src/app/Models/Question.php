<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Question extends Model
{
    use HasFactory;

    // Examページにて使用
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

    // Dashboardページにて使用
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

    // MyAccountページにて使用
    public function getQuestionsListForMyAccount(int $user_id)
    {
        // subjectsもジョイン
        $questions = DB::table('questions')
            ->select('questions.id', 'questions.number as question_number', 'questions.caption', 'subjects.number as subject_number', 'subjects.harf_div')
            ->join('review_marks', 'questions.id', '=', 'review_marks.question_id')
            ->join('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->where('user_id', $user_id)
            ->get();
        return $questions;
    }

    public function getQuestionForRetry(int $id)
    {
        $query = DB::table('questions')
            ->select('questions.id', 'questions.subject_id', 'questions.number as question_number', 'questions.caption', 'questions.caption_img', 'questions.choice1', 'questions.choice2', 'questions.choice3', 'questions.choice4', 'questions.choice5', 'questions.choice_img1', 'questions.choice_img2', 'questions.choice_img3', 'questions.choice_img4', 'questions.choice_img5', 'questions.answer', 'questions.explan', 'questions.explan_img', 'questions.inappropriate_flg', 'subjects.type', 'subjects.name', 'subjects.year', 'subjects.number as subject_number', 'subjects.harf_div')
            ->leftJoin('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->where('questions.id', $id);
        // Examページの表示と合わせるためにpaginateで出力する
        $question = $query->paginate(1);
        return $question;
    }

    public function getAllQuestionsForRetry(array $question_ids)
    {
        $query = DB::table('questions')
            ->select('questions.id', 'questions.subject_id', 'questions.number as question_number', 'questions.caption', 'questions.caption_img', 'questions.choice1', 'questions.choice2', 'questions.choice3', 'questions.choice4', 'questions.choice5', 'questions.choice_img1', 'questions.choice_img2', 'questions.choice_img3', 'questions.choice_img4', 'questions.choice_img5', 'questions.answer', 'questions.explan', 'questions.explan_img', 'questions.inappropriate_flg', 'subjects.type', 'subjects.name', 'subjects.year', 'subjects.number as subject_number', 'subjects.harf_div')
            ->leftJoin('subjects', 'questions.subject_id', '=', 'subjects.id')
            ->whereIn('questions.id', $question_ids);
        // Examページの表示と合わせるためにpaginateで出力する
        $question = $query->paginate(1);
        return $question;
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
