@extends('layouts.master')

<!DOCTYPE html>
<html lang="en">

<head>
    @push('title')
        <title>Compleated Tasks</title>
    @endpush
</head>

<body>

    @section('main')
    <div class="title-bar">
        <h1>Compleated Tasks</h1>
        <div>
            <a href="{{url('/addtask')}}">
                <button class="btn1">+ New Task</button>
            </a>
            <a href="{{url('/')}}">
                <button class="btn2">Pending Tasks</button>
            </a>
        </div>
    </div>
    <div class="tasks-container">
        @foreach ($tasks as $data)
        <div class="todo">
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
                    <a href="{{ url('/permanentDelete') }}/{{ $data->task_id }}" class="icon-link">
                        <img src="/images/delete.png" width="24px" title="Delete Permanantly" />
                    </a>
                    <a href="{{ url('/restore') }}/{{ $data->task_id }}" class="icon-link">
                        <img src="/images/undone.png" width="24px" title='Mark As Not Compleated' />
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endsection

</body>

</html>
