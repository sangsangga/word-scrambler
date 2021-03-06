<?php

namespace App\Http\Controllers;

use App\Models\GamesHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login');
    }

    public function loginIndex()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);



        if (!auth()->attempt($request->only('username', 'password'))) {
            return back()->with('status', 'Invalid username/password');
        }
        $request->session()->put("score", 0);

        return redirect("/game");
    }

    public function logout(Request $request)
    {
        $score = $request->session()->get("score");
        $userId = auth()->user()->id;
        GamesHistory::create([
            'user_id' => $userId,
            'score' => $score,

        ]);
        auth()->logout();
        return redirect()->route("home");
    }

    public function myGame()
    {
        $histories = auth()->user()->Histories;
        return view('history', ["histories" => $histories]);
    }
}
