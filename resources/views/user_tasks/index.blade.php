@extends('layouts.master')

@section('title', 'User tasks')

@section('content')
    <div class="container">
        <div class="d-flex  align-items-center mt-5 mb-4">
            <h1>User tasks</h1>
            <div class="ms-auto">
                <form action="{{ route('user_tasks.complete_all') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline-primary">Resolve all</button>
                </form>
            </div>
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
                    <th scope="row">{{ $task->id }}</th>
                    <td>{{ $task->reference }}</td>
                    <td>
                        <button
                            data-task-resolve
                            data-task-id="{{ $task->id }}"
                            class="btn btn-sm btn-outline-primary">
                            Resolve
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
