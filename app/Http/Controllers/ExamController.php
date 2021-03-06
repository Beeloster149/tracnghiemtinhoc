<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\Questions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ExamController extends Controller
{
    public function showDeTongHop()
    {
        return view('detonghop');
    }

    public function showQuestionsByExamID($examID)
    {
        $questions = Questions::getQuestionsByExamID($examID);
        if(Session::has('AccountID')) {
            if(count($questions)>0)
                return view('examDetails')
                    ->with('questions', $questions);
            else
                return view('errors.404');
        }
        else {
            return redirect(route('login'));
        }

    }

    public function submitExamAndCalculateScore($examID, Request $request)
    {
        $answers = Questions::getAnswersByExamID($examID);
        $score = 0;
        foreach ($answers as $asw) {
            if ($request->has('question'.$asw->QuestionID)) {
                if (strlen($asw->CorrectAnswers) == 1) {
                    if ($asw->CorrectAnswers == $request->input('question'.$asw->QuestionID))
                        $score++;
                } else {
                    $correctAnswersArray = explode(",", $asw->CorrectAnswers);
                    $examAnswersArray = $request->input('question'.$asw->QuestionID);
                    $compareResult = array_diff($correctAnswersArray, $examAnswersArray);
                    if (empty($compareResult))
                        $score++;
                }
            }
        }
        $request->session()->put('score', $score);
        return back()->withInput()->with($score);
    }
}
