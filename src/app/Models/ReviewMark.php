<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewMark extends Model
{
    public function check(int $user_id, int $question_id)
    {
        return DB::table('review_marks')
            ->where('user_id', $user_id)
            ->where('question_id', $question_id)
            ->count();
    }

    public function insertOrDelete(int $user_id, int $question_id, int $reviewMarkFlg)
    {
        if ($reviewMarkFlg === 1) {
            DB::table('review_marks')->insert([
                'user_id' => $user_id,
                'question_id' => $question_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        } elseif ($reviewMarkFlg === 0) {
            DB::table('review_marks')
                ->where('user_id', $user_id)
                ->where('question_id', $question_id)
                ->delete();
        }
    }

    public function getQuestionIds(int $user_id)
    {
        return DB::table('review_marks')
            ->select('question_id')
            ->where('user_id', $user_id)
            ->pluck('question_id')->all();
    }
}
