@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <table class="table table-hover">
                    <thead>
                    <th>Task ID</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Status</th>
                    <th>Actions</th>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->content }}</td>
                            <td>
                                <span class="label {{ $task->isDone ? 'label-success' : 'label-danger' }}">{{ $task->isDone ? 'Done' : 'Pending' }}</span>
                            </td>
                            <td>
                                <a href="javascript:void(0);" onclick="$('#finish-task-{{$task->id}}').submit()"
                                   class="text-success"><span class="fa fa-check"></span></a> |
                                <a href="javascript:void(0);" onclick="$('#delete-task-{{$task->id}}').submit()"
                                   class="text-danger"><span class="fa fa-trash"></span></a>

                                <form id="finish-task-{{$task->id}}" method="post" style="display: none;"
                                      action="{{ route('task.finish', $task->id) }}">{{ csrf_field() }}</form>
                                <form id="delete-task-{{$task->id}}" method="post" style="display: none;"
                                      action="{{ route('task.delete', $task->id) }}">{{ csrf_field() }}</form>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        @if(Auth::user()->isAdmin)
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Add Task</div>
                        <div class="panel-body">
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
                                        <input class="form-control" type="text" name="title" id="taskTitle" autofocus
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
                                        <button type="submit" class="btn btn-success"><span class="fa fa-send"></span>
                                            Send
                                        </button>
                                        <button type="reset" class="btn-link btn">
                                            <div class=" text-danger">Clear</div>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection