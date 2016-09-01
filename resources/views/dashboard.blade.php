@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-hover table-striped">
            <thead>
            <th>Task ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Progress</th>
            <th>Options</th>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>$task->id</td>
                    <td>$task->title</td>
                    <td>$task->content</td>
                    <td><span class="label label-success">$task->isDone</span></td>
                    <td>
                        <button type="btn btn-primary"><i class="fa fa-cog"></i></button>
                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
        @if(Auth::user()->isAdmin)
            <div class="panel panel-default">
                <div class="panel-heading">Add task</div>
                <div class="panel-body">
                    <form method="post" action="{{ route('task.create') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                        <table>
                            <tr><td>To user: </td><td><select name="userId" class="form-control">
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select></td></tr>
                            <tr><td>Task title: </td><td><input name="title" class="form-control" type="text"></td></tr>
                            <tr><td>Description: </td><td><textarea name="content" class="form-control"></textarea></td></tr>
                            <tr><td><button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Send</button></td></tr>
                        </table>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection