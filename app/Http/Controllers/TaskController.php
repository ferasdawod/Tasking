<?php

namespace App\Http\Controllers;

use App\Task;
use Auth;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class TaskController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard')->with(['tasks' => Auth::user()->tasks, 'users' => User::all('name', 'id')]);
    }

    public function store(Request $request)
    {
        $task = Task::create($request->all());

        $user = User::find($request->userId);
        $user->tasks()->save($task);

        return redirect()->route('dashboard');
    }
}
