<?php

namespace App\Http\Controllers;

use App\Http\Requests\Dashboard\CreateQuestionRequest;
use Illuminate\Http\Request;
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
        $questions = $question->getQuestionListForDashboard($request->id);
        return view('dashboard_question_list', ['subjectNumber' => $request->number, 'questions' => $questions]);
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

        $storedFiles = $this->putFile($request);
        $question = new Question();
        $question->createQuestion($request, $storedFiles);
        return redirect('/dashboard');
    }

    private function putFile($request): array
    {
        $targets = array(
            'captionImg' => null,
            'choiceImg1' => null,
            'choiceImg2' => null,
            'choiceImg3' => null,
            'choiceImg4' => null,
            'choiceImg5' => null,
            'explanImg'  => null,
        );
        foreach (array_keys($targets) as $target) {
            if ($request->hasFile($target)) {
                $file_name = $request->file($target)->hashName();
                $request->file($target)->storeAs('public/test_img', $file_name);
                $targets[$target] = $file_name;
            }
        }
        return $targets;
    }
}
