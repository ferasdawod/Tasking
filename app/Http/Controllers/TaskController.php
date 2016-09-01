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
        $task = new Task();
        $task->fill($request->all());
        $task->isDone = false;

        $task->issuedById = Auth::user()->id;
        $task->userId = $request->userId;
        $task->save();
        
        return redirect()->route('dashboard');
    }

    public function finishTask(Task $task)
    {
        $task->isDone = true;
        $task->save();
        return redirect()->route('dashboard');
    }

    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('dashboard');
    }
}
