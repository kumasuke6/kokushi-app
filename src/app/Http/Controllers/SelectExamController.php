<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class SelectExamController extends Controller
{
    public function subjectShow(Request $request){
        $subject = new Subject();
        $subjects = $subject->get_subjects($request);

        return view('select_exam', ['subjects' => $subjects]);
    }
}
