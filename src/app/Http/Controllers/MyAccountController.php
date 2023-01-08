<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Question;

class MyAccountController extends Controller
{
    public function myAccount()
    {
        $user = Auth::user();
        $questionModel = new Question();
        $questions = $questionModel->getQuestionsListForMyAccount($user->id);
        return view('my_account', ['user' => $user, 'questions' => $questions]);
    }
}
