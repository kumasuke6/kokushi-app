<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ExamController extends Controller
{
    public function showQuestions(Request $request)
    {
        $questionModel = new Question();
        list($questions, $seed) = $questionModel->getQuestions($request->seed, $request->ids, $request->random);

        // choiceをランダムにする処理
        $choices = array(
            'choice1' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img1],
            'choice2' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img2],
            'choice3' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img3],
            'choice4' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img4],
            'choice5' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img5],
        );
        $aryKey = array_keys($choices);
        shuffle($aryKey);
        $randomChoices = array();
        foreach ($aryKey as $key) {
            $randomChoices[$key] = $choices[$key];
        }
        // answerを配列にする処理
        $aryAnswer = str_split($questions[0]->answer);
        foreach ($aryAnswer as $key => $value) {
            $aryAnswer[$key] = "choice" . $value;
        }

        // TODO: questionの内容がほかの項目とかぶっているため再検討必要。
        return view('exam', ['questions' => $questions, 'randomChoices' => $randomChoices, 'aryAnswers' => $aryAnswer, 'seed' => $seed, 'examNumber' => $request->examNumber]);
    }
}
