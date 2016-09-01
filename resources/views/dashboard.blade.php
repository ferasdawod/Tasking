@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-hover table-striped">
            <thead>
                <th>Task ID</th><th>Title</th><th>Description</th><th>Progress</th><th>Options</th>
            </thead>
            <tbody>
                <tr><td>0</td><td>Test Title</td><td>Complete this test title</td><td><span class="label label-success">Done</span></td>
                <td><button type="btn btn-primary"><i class="fa fa-cog"></i></button></td></tr>
            </tbody>
        </table>
    </div>
@endsection