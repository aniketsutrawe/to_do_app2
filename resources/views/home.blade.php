@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

<head>
    @push('title')
        <title>To Do App</title>
    @endpush
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>

    @section('main')
        <div class="title-bar">
            <h1>Pending Tasks</h1>
            <div>
                <a href="{{ url('/addtask') }}">
                    <button class="btn1">+ New Task</button>
                </a>
                <a href="{{ url('/compleatedTasks') }}">
                    <button class="btn2">Completed Tasks</button>
                </a>
            </div>
        </div>
        <div class="tasks-container">
            @foreach ($tasks as $data)
                <div class="todopending">
                    <div class="container">
                        <h2 class="task-heading">{{ $data->heading }}</h2>
                        <p class="task-message">{{ $data->discription }}</p>
                    </div>
                    <div class="date-and-action">
                        <div class="task-date">
                            Date: {{ date('d-M-Y', strtotime($data->updated_at)) }}<br />
                            Time: {{ date('H:i:s', strtotime($data->updated_at)) }}
                        </div>
                        <div class="task-action">
                            <a href="{{ url('/edit') }}/{{ $data->task_id }}" class="icon-link">
                                <img src="/images/edit.png" width="24px" title="Edit Task" />
                            </a>
                            {{-- <a href="{{ url('/permanentDelete') }}/{{ $data->task_id }}" class="icon-link">
                                <img src="/images/delete.png" width="24px" title="Delete Permanently" />
                            </a> --}}
                            <a href="{{ url('/delete') }}/{{ $data->task_id }}" class="icon-link">
                                <img src="/images/check.png" width="24px" title="Mark as Compleated" />
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endsection

</body>

</html>
