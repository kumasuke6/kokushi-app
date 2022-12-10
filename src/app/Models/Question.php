<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            ->select('questions.id', 'questions.subject_id', 'questions.number as question_number', 'questions.caption', 'questions.caption_img', 'questions.choice1', 'questions.choice2', 'questions.choice3', 'questions.choice4', 'questions.choice5', 'questions.choice_img1', 'questions.choice_img2', 'questions.choice_img3', 'questions.choice_img4', 'questions.choice_img5', 'questions.answer', 'questions.explan', 'questions.explan_img', 'questions.inappropriate_flg', 'subjects.type', 'subjects.name', 'subjects.year', 'subjects.number as subject_number', 'subjects.harf_div')
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

    public function getQuestionForCreateQuestionReq(int $subject_id, int $number)
    {
        $count = DB::table('questions')
            ->where('subject_id', $subject_id)
            ->where('number', $number)
            ->count();
        return $count;
    }

    public function createQuestion($request, array $storedFile)
    {
        DB::table('questions')->insert([
            'subject_id' => $request->subjectId,
            'number' => $request->number,
            'caption' => $request->caption,
            'caption_img' => $storedFile['captionImg'],
            'choice1' => $request->choice1,
            'choice2' => $request->choice2,
            'choice3' => $request->choice3,
            'choice4' => $request->choice4,
            'choice5' => $request->choice5,
            'choice_img1' => $storedFile['choiceImg1'],
            'choice_img2' => $storedFile['choiceImg2'],
            'choice_img3' => $storedFile['choiceImg3'],
            'choice_img4' => $storedFile['choiceImg4'],
            'choice_img5' => $storedFile['choiceImg5'],
            'answer' => $request->answer,
            'explan' => $request->explan,
            'explan_img' => $storedFile['explanImg'],
            'inappropriate_flg' => $request->inappropriateFlg,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
