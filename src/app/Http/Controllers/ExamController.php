<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;

class ExamController extends Controller
{
    public function showQuestions(Request $request){
        $questionModel = new Question();
        $result = $questionModel->getQuestions($request);

        // choiceをランダムにする処理
        $choices = array(
            'choice1' => $result[0]->choice1,
            'choice2' => $result[0]->choice2,
            'choice3' => $result[0]->choice3,
            'choice4' => $result[0]->choice4,
            'choice5' => $result[0]->choice5,
        );
        $aryKey = array_keys($choices);
        shuffle($aryKey);
        $randomChoices = array();
        foreach($aryKey as $key){
            $randomChoices[$key] = $choices[$key];
        }

        // answerを配列にする処理
        $aryAnswer = str_split($result[0]->answer);
        foreach($aryAnswer as $key => $value){
            $aryAnswer[$key] = "choice" . $value;
        }

        // TODO: questionの内容がほかの項目とかぶっているため再検討必要。
        return view('exam', ['questions' => $result, 'randomChoices' => $randomChoices, 'aryAnswers' => $aryAnswer]);
    }

    public function endExam(Request $request){
        return view('end_exam', ['pageCount' => $request->page_count]);
    }
}
