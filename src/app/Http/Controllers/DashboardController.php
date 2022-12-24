<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Dashboard\CreateQuestionRequest;
use App\Http\Requests\Dashboard\CreateSubjectRequest;
use App\Http\Requests\Dashboard\DeleteSubjectRequest;
use App\Http\Requests\Dashboard\QuestionListRequest;
use App\Models\Subject;
use App\Models\Question;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $subject = new Subject();
        $subjects = $subject->getSubjects();
        return view('dashboard', ['subjects' => $subjects]);
    }

    public function showDashboardQuestionList(QuestionListRequest $request)
    {
        $question = new Question();
        $subject = new Subject();
        $subjectResult = $subject->getSubjects(null, $request->id);
        // dd($subjectResult);
        $questions = $question->getQuestionListForDashboard($request->id);
        return view('dashboard_question_list', ['subjectNumber' => $subjectResult[0]->number, 'questions' => $questions]);
    }

    public function showDashboardQuestionDetail(Request $request)
    {
        $question = new Question();
        $result = $question->getQuestion($request->id);
        $subject = new Subject();
        $subjects = $subject->getSubjects();
        return view('dashboard_question_detail', ['question' => $result, 'subjects' => $subjects]);
    }

    public function showDashboardQuestion()
    {
        return view('dashboard_question');
    }

    public function showDashboardUsers()
    {
        return view('dashboard_users');
    }

    public function createSubject(CreateSubjectRequest $request)
    {
        $subject = new Subject();
        switch ($request->type) {
            case 0:
                $name = "理学療法士国家試験";
                break;
            case 1:
                $name = "理学療法士オリジナル問題";
        }
        $subject->insertSubject($request->type, $name, $request->year, $request->number, $request->harfDiv);
        return redirect('/dashboard');
    }

    public function deleteSubject(DeleteSubjectRequest $request)
    {
        $subject = new Subject();
        $subject->deleteSubject($request->id);
        return redirect('/dashboard');
    }

    public function createQuestion(CreateQuestionRequest $request)
    {
        $create_columns = $this->putFiles($request);
        $question = new Question();
        $question->createQuestion($create_columns);
        return redirect('/dashboard');
    }

    public function updateQuestion(Request $request)
    {
        $question = new Question();
        $update_columns = array();

        $update_columns = $this->putFiles($request);

        foreach (array_keys($request->file()) as $key) {
            $deleteImgPath = $question->getDeleteImgPath($request->id, $key);
            Storage::delete('public/test_img/' . $deleteImgPath[0]->$key);
        }
        // 新しいファイルの作成
        $question->updateQuestion($update_columns);
        return redirect('/dashboard/questionList?id=' . $request->subject_id);
    }

    // private function putFiles($request): array
    // {
    //     $targets = array(
    //         'captionImg' => null,
    //         'choiceImg1' => null,
    //         'choiceImg2' => null,
    //         'choiceImg3' => null,
    //         'choiceImg4' => null,
    //         'choiceImg5' => null,
    //         'explanImg'  => null,
    //     );
    //     foreach (array_keys($targets) as $target) {
    //         if ($request->hasFile($target)) {
    //             $file_name = $request->file($target)->hashName();
    //             $request->file($target)->storeAs('public/test_img', $file_name);
    //             $targets[$target] = $file_name;
    //         }
    //     }
    //     return $targets;
    // }

    private function putFiles($request): array
    {
        $columns = $request->all();
        unset($columns['_token']);
        foreach (array_keys($request->file()) as $file_name) {
            $hash_file_name = $request->file($file_name)->hashName();
            $request->file($file_name)->storeAs('public/test_img', $hash_file_name);
            $columns[$file_name] = $hash_file_name;
        }
        return $columns;
    }
}
