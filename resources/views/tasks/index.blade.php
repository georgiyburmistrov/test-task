@extends('layouts.app')
@section('title')
    Просмотр и добавление задач
@endsection
@section('content')

    <div class="panel-body">

        @include('common.errors')

        <form action="{{ url('task') }}" method="POST" class="form-horizontal">
            @csrf

            <div class="form-group">
                <label for="task-name" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
    </div>

    @if (count($tasks) > 0)
        <div class="panel panel-default">
            <div class="panel-heading">
                Current Tasks
            </div>

            <div class="panel-body">
                <table class="table table-striped task-table">

                    <thead>
                    <th>Task</th>
                    <th>&nbsp;</th>
                    </thead>

                    <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td class="table-text">
                                <div>{{ $task->name }}</div>
                            </td>

                            <td>
                        <tr>

                            <td class="table-text">
                                <div></div>
                            </td>

                            <td>
                                <form action="{{ url('task/'.$task->id) }}" method="POST">
                                    @csrf
                                    {{ method_field('DELETE') }}

                                    <button type="submit" id="delete-task-{{ $task->id }}" class="btn btn-danger">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

@endsection
