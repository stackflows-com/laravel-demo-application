@extends('layouts.master')

@section('title', 'Throw a demo signal')

@section('content')
    <div class="d-flex d-flex justify-content-center align-items-center h-100">
        <div class="p-md-3 p-2 text-center" style="max-width: 30rem;">
            <h1 class="fw-bold">Start a tagged process</h1>
            <p class="lead">Stackflows uses tags to start processes, please add tag to your process and use it here</p>
            <form action="{{ route('process.start') }}" method="POST" class="mt-5 mb-5">
                @csrf
                <div class="mb-3 mt-5">
                    <label for="tag" class="form-label visually-hidden">Process tag</label>
                    <input type="text"
                           name="tag"
                           class="form-control @error('tag') is-invalid @enderror"
                           id="tag"
                           aria-describedby="signalValidation"
                           placeholder="Enter a tag to start processes by..."
                           required
                    >
                    @error('tag')
                    <div id="signalValidation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Start tagged processes</button>
            </form>
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('exception'))
                <div class="alert alert-danger" role="alert">
                    {{ session('exception') }}
                </div>
            @endif
        </div>
    </div>
@endsection
