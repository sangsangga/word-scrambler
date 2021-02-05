<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
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
        } else {
            $message = "false";
        }
        return response()->json($message, 200);
    }
}
