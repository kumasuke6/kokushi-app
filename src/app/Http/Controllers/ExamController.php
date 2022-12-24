<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShowQuestionRequest;
use App\Models\Question;

class ExamController extends Controller
{
    public function showQuestions(ShowQuestionRequest $request)
    {
        $questionModel = new Question();
        list($questions, $seed) = $questionModel->getQuestions($request->seed, $request->subject_ids, $request->q_random);

        $choices = array(
            'choice1' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img1],
            'choice2' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img2],
            'choice3' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img3],
            'choice4' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img4],
            'choice5' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img5],
        );

        // choiceをランダムにする処理
        $resultChoices = array();
        if (!is_null($request->choice_random)) {
            $aryKey = array_keys($choices);
            shuffle($aryKey);

            foreach ($aryKey as $key) {
                $resultChoices[$key] = $choices[$key];
            }
        } else {
            $resultChoices = $choices;
        }

        // answerを配列にする処理
        $aryAnswer = str_split($questions[0]->answer);
        foreach ($aryAnswer as $key => $value) {
            $aryAnswer[$key] = "choice" . $value;
        }

        // TODO: questionの内容がほかの項目とかぶっているため再検討必要。
        return view('exam', ['questions' => $questions, 'choices' => $resultChoices, 'aryAnswers' => $aryAnswer, 'seed' => $seed, 'examNumber' => $request->exam_number]);
    }
}
