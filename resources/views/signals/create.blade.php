@extends('layouts.master')

@section('title', 'Throw a demo signal')

@section('content')
    <div class="d-flex d-flex justify-content-center align-items-center h-100">
        <div class="p-md-3 p-2 text-center" style="max-width: 30rem;">
            <h1 class="font-bold">Throw a demo signal</h1>
            <p class="lead">To test demo process please enter a signal key and press "Throw signal"</p>
            <form action="{{ route('signals.store') }}" method="POST" class="mt-5 mb-5">
                @csrf
                <div class="mb-3 mt-5">
                    <label for="signal" class="form-label visually-hidden">Signal key</label>
                    <input type="text"
                           name="signal"
                           class="form-control @error('signal') is-invalid @enderror"
                           id="signal"
                           aria-describedby="signalValidation"
                           placeholder="Enter a signal key..."
                           required
                    >
                    @error('signal')
                    <div id="signalValidation" class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Throw signal</button>
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
        </div>
    </div>
@endsection
