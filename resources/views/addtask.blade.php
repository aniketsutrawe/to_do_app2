@extends('layouts.master')

@push('title')
    <title>New Task</title>
@endpush

@section('main')
<div class="add-task-form">
    <h1 class="new-task-heading">{{$title}}</h1>
    <form action="{{$url}}" method="post">
        @csrf
        <div class="form-group">
            <input type="text" id="taskheading" name="taskheading" placeholder="{{ $task ? $task->heading : '' }}" required />
            <label for="taskheading">Task Heading</label>
        </div>
        <div class="form-group">
            <textarea id="taskdescription" name="taskdescription" placeholder="{{ $task ? $task->discription : '' }}"  rows="1" required></textarea>
            <label for="taskdescription">Task Description</label>
        </div>
        <div class="form-group">
            <button type="submit">Add Task</button>
            <button type="reset" class="ml-4 ">Reset</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
    const textarea = document.getElementById('taskdescription');
    textarea.addEventListener('input', autoResize, false);

    function autoResize() {
        this.style.height = 'auto';
        this.style.height = this.scrollHeight + 'px';
    }
});

</script>
@endsection
