@extends('layouts.master')

@section('title', 'User tasks')

@section('content')
    <div class="container">
        <div class="d-flex  align-items-center mt-5 mb-2">
            <h1>User tasks</h1>
            <div class="ms-auto">
                <form action="{{ route('user_tasks.complete_all') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Resolve all</button>
                </form>
            </div>
        </div>
        <div class="btn-group mb-4">
            <a href="{{ route('user_tasks.index') }}"
               class="btn btn-light">Pending</a>
{{--            <a href="{{ route('user_tasks.index', ['status' => \App\Stackflows\TaskStatus::SENDING]) }}"--}}
{{--               class="btn btn-light">Sending</a>--}}
{{--            <a href="{{ route('user_tasks.index', ['status' => \App\Stackflows\TaskStatus::COMPLETED]) }}"--}}
{{--               class="btn btn-light">Completed</a>--}}
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Reference</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr>
                    <th scope="row">{{ $task->getReference() }}</th>
                    <td>{{ $task->getSubject() }}</td>
                    <td>
{{--                        @if($task->status->is(\App\Stackflows\TaskStatus::PENDING))--}}
{{--                            <button--}}
{{--                                data-task-resolve--}}
{{--                                data-task-id="{{ $task->reference }}"--}}
{{--                                class="btn btn-sm btn-outline-primary">--}}
{{--                                Resolve--}}
{{--                            </button>--}}
{{--                        @endif--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
