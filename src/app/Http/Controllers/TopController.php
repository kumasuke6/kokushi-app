<?php

namespace App\Http\Controllers;

use App\Models\Subject;

class TopController extends Controller
{
    public function showSubjects()
    {
        $subject = new Subject();
        $subjects = $subject->getSubjects();
        return view('top', ['subjects' => $subjects]);
    }
}
