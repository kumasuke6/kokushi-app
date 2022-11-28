<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\CreateSubjectRequest;
use App\Http\Requests\Dashboard\DeleteSubjectRequest;
use App\Models\Subject;

class DashboardController extends Controller
{
    public function showDashboard()
    {
        $subject = new Subject();
        $subjects = $subject->getSubjects();
        return view('dashboard', ['subjects' => $subjects]);
    }

    public function showDashboardQuestions()
    {
        return view('dashboard_questions');
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
}
