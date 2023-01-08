<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ShowQuestionRequest;
use App\Models\Question;
use App\Models\ReviewMark;
use Illuminate\Support\Facades\Auth;

class ExamController extends Controller
{
    public function showQuestions(ShowQuestionRequest $request)
    {
        $questionModel = new Question();
        $reviewMarkModel = new ReviewMark();

        list($questions, $seed) = $questionModel->getQuestions($request->seed, $request->subject_ids, $request->q_random);

        // 見直しチェックの確認
        $reviewMark = 0;
        $user = Auth::user();
        if (!is_null($user)) {
            $reviewMark = $reviewMarkModel->check($user->id, $questions[0]->id);
        }

        $resultChoices = $this->choiceRandom($questions, $request->choice_random);
        $aryAnswer = $this->arrayAnswer($questions[0]->answer);

        // TODO: questionの内容がほかの項目とかぶっているため再検討必要。
        return view('exam', ['questions' => $questions, 'choices' => $resultChoices, 'aryAnswers' => $aryAnswer, 'seed' => $seed, 'examNumber' => $request->exam_number, 'reviewMark' => $reviewMark]);
    }

    public function showQuestionForRetry(Request $request)
    {
        $questionModel = new Question();
        $reviewMarkModel = new ReviewMark();

        $questions = $questionModel->getQuestionForRetry($request->id);

        // 見直しチェックの確認
        $reviewMark = 0;
        $user = Auth::user();
        if (!is_null($user)) {
            $reviewMark = $reviewMarkModel->check($user->id, $questions[0]->id);
        }

        $resultChoices = $this->choiceRandom($questions, 1);
        $aryAnswer = $this->arrayAnswer($questions[0]->answer);

        // examNumber(出題問題数)は1, seedは0を常時返却。
        return view('exam', ['questions' => $questions, 'choices' => $resultChoices, 'aryAnswers' => $aryAnswer, 'seed' => 0, 'examNumber' => 1, 'reviewMark' => $reviewMark]);
    }

    // public function showAllQuestionsForRetry()
    // {
    //     $user = Auth::user();
    //     $reviewMarkModel = new ReviewMark();
    //     $questionModel = new Question();

    //     $questionIds = $reviewMarkModel->getQuestionIds($user->id);
    //     $questions = $questionModel->getAllQuestionsForRetry($questionIds);
    //     dd($questions);
    // }

    // public function changeReviewMark(Request $request)
    // {
    //     $user = Auth::user();
    //     $reviewMarkModel = new ReviewMark();
    //     if (!is_null($user)) {
    //         $reviewMarkModel->insertOrDelete($user->id, $request->input('questionId'), $request->input('reviewMarkFlg'));
    //     }
    // }

    // choiceをランダムにする処理(見直し問題は常にランダムにする)
    private function choiceRandom($questions, ?int $random_flg): array
    {
        $choices = array(
            'choice1' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img1],
            'choice2' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img2],
            'choice3' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img3],
            'choice4' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img4],
            'choice5' => ['text' => $questions[0]->choice1, 'img' => $questions[0]->choice_img5],
        );

        // choiceをランダムにする処理
        $resultChoices = array();
        if (!is_null($random_flg)) {
            $aryKey = array_keys($choices);
            shuffle($aryKey);

            foreach ($aryKey as $key) {
                $resultChoices[$key] = $choices[$key];
            }
        } else {
            $resultChoices = $choices;
        }

        return $resultChoices;
    }

    // answerを配列にする処理(examページのjsで使用する)
    private function arrayAnswer(int $answer): array
    {
        $aryAnswer = str_split($answer);
        foreach ($aryAnswer as $key => $value) {
            $aryAnswer[$key] = "choice" . $value;
        }
        return $aryAnswer;
    }
}
