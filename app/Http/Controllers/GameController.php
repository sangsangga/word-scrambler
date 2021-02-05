<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function getAllWord()
    {
        $result = Word::paginate(1);
        return response()->json($result, 200);
    }

    public function checkAnswer(Request $request, $id)
    {
        $answer = $request->answer;
        $message = "";
        $word = Word::find($id);
        if ($answer == $word->word) {
            $message = "true";
            $request->session()->increment('score', $amount = 100);
        } else {
            $message = "false";
        }

        $score = $request->session()->get('score');
        return response()->json($message, 200);
    }

    public function index()
    {
        return view('game');
    }
}
