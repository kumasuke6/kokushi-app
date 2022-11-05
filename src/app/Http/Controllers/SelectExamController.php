<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SelectExamController extends Controller
{
    public function showSubjects(Request $request){
        $subject = new Subject();
        $subjects = $subject->getSubjects($request);
        return view('select_exam', ['subjects' => $subjects]);
    }
}
