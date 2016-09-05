@extends('layouts.app')
@section('additional_styles')
    <style>
    .well {
    margin-top: 10px;
    }
    @font-face {
        font-family: bellerose;
        src: url('{{ asset('/fonts/Bellerose.ttf') }}');
    }
    .headerBrandText {
        font-family: bellerose;
        margin-top: -13px;
        text-shadow: #ffffff 0px 0px 1px;
        font-size: 40px;
    }
    </style>
@endsection
@section('headerBrand')
    <div class="headerBrandText">Tasker</div>
@endsection
@section('content')
    <div class="container">
        <ul class="nav nav-tabs nav-justified">
            <li class="active"><a data-toggle="tab" href="#tasks"><i class="fa fa-tasks"></i> Your Tasks</a></li>
            <li><a data-toggle="tab" href="#addtask"><i class="fa fa-plus-square-o"></i> Add a Task</a></li>
            @if(Auth::user()->isAdmin)
                <li><a data-toggle="tab" href="#usertasks"><i class="fa fa-tasks"></i> Admin - User Tasks</a></li>
                <li><a data-toggle="tab" href="#givetask"><i class="fa fa-edit"></i> Admin - Give a Task</a>
                </li>
            @endif
        </ul>
        <div class="tab-content">
            <div id="tasks" class="tab-pane fade in active">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        @if ($tasks->count() > 0)
                            <div class="well">
                                <table class="table table-striped table-hover">
                                    <thead>
                                    <th>Task ID</th>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Issued By</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                    </thead>
                                    <tbody>
                                    @foreach($tasks as $task)
                                        <tr>
                                            <td>{{ $task->id }}</td>
                                            <td>{{ $task->title }}</td>
                                            <td>{{ $task->content }}</td>
                                            <td>{{ App\User::find($task->issuedById)->name == Auth::user()->name ? 'Me' : App\User::find($task->issuedById)->name}}</td>
                                            <td>
                                                <span class="label {{ $task->isDone ? 'label-success' : 'label-danger' }}">{{ $task->isDone ? 'Done' : 'Pending' }}</span>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);"
                                                   onclick="$('#finish-task-{{$task->id}}').submit()"
                                                   class="text-success"><span class="fa fa-check"></span></a> |
                                                <a href="javascript:void(0);"
                                                   onclick="$('#delete-task-{{$task->id}}').submit()"
                                                   class="text-danger"><span class="fa fa-trash"></span></a>

                                                <form id="finish-task-{{$task->id}}" method="post"
                                                      style="display: none;"
                                                      action="{{ route('task.finish', $task->id) }}">{{ csrf_field() }}</form>
                                                <form id="delete-task-{{$task->id}}" method="post"
                                                      style="display: none;"
                                                      action="{{ route('task.delete', $task->id) }}">{{ csrf_field() }}</form>
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="well">
                                <h3 style="text-align: center;">No tasks yet!</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div id="addtask" class="tab-pane fade in">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="well">
                            <form method="post" action="{{ route('task.create', ['userId' => Auth::user()->id]) }}" class="form-horizontal">
                                {{ csrf_field() }}
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="taskTitle">Title</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="title" id="taskTitle"
                                               autofocus
                                               value="{{ old('title') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2" for="taskContent">Content</label>
                                    <div class="col-md-10">
                                        <input class="form-control" type="text" name="content" id="taskContent"
                                               value="{{ old('content') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-offset-2 col-md-2">
                                        <button type="submit" class="btn btn-success"><span
                                                    class="fa fa-send"></span>
                                            Send
                                        </button>
                                        <button type="reset" class="btn btn-danger">
                                            <i class="fa fa-trash"></i> Clear
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @if(Auth::user()->isAdmin)
                <div id="givetask" class="tab-pane fade in">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="well">
                                <form method="post" action="{{ route('task.create') }}" class="form-horizontal">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="userSelect" class="control-label col-md-2">Select User</label>
                                        <div class="col-md-10">
                                            <select id="userSelect" name="userId" class="form-control">
                                                @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2" for="taskTitle">Title</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="title" id="taskTitle"
                                                   autofocus
                                                   value="{{ old('title') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-2" for="taskContent">Content</label>
                                        <div class="col-md-10">
                                            <input class="form-control" type="text" name="content" id="taskContent"
                                                   value="{{ old('content') }}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-offset-2 col-md-2">
                                            <button type="submit" class="btn btn-success"><span
                                                        class="fa fa-send"></span>
                                                Send
                                            </button>
                                            <button type="reset" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Clear
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="usertasks" class="tab-pane fade in">
                    <div class="well">
                        <table class="table table-striped table-hover">
                            <thead>
                            <th>Task ID</th>
                            <th>User</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Issued By</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($userTasks as $userTask)
                                <tr>
                                    <td>{{ $userTask->id }}</td>
                                    <td>{{ App\User::find($userTask->userId)->name }}</td>
                                    <td>{{ $userTask->title }}</td>
                                    <td>{{ $userTask->content }}</td>
                                    <td>{{ App\User::find($userTask->issuedById)->name}}</td>
                                    <td>
                                        <span class="label {{ $userTask->isDone ? 'label-success' : 'label-danger' }}">{{ $userTask->isDone ? 'Done' : 'Pending' }}</span>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);"
                                           onclick="$('#finish-task-{{$userTask->id}}').submit()"
                                           class="text-success"><span class="fa fa-check"></span></a> |
                                        <a href="javascript:void(0);"
                                           onclick="$('#delete-task-{{$userTask->id}}').submit()"
                                           class="text-danger"><span class="fa fa-trash"></span></a>

                                        <form id="finish-task-{{$userTask->id}}" method="post"
                                              style="display: none;"
                                              action="{{ route('task.finish', $userTask->id) }}">{{ csrf_field() }}</form>
                                        <form id="delete-task-{{$userTask->id}}" method="post"
                                              style="display: none;"
                                              action="{{ route('task.delete', $userTask->id) }}">{{ csrf_field() }}</form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <footer style="position: fixed;bottom: 0;font-size: 10px; background-color: #222; color: #9d9d9d; width: 100%; text-align: center;">
        Made with <i class="fa fa-heart"></i> by Feras Dawod & Safwan Alhaji.
    </footer>
@endsection