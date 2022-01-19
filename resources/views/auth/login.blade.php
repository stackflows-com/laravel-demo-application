@extends('layouts.master')

@section('title', 'Login into backoffice')

@section('content')
    <div class="d-flex d-flex justify-content-center align-items-center h-100">
        <div class="p-md-3 p-2" style="max-width: 48rem;">
            @if($isAuth)
                <h1 class="fw-bold">You are authenticated</h1>
                <div class="my-5 text-center">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary">Logout</button>
                    </form>
                </div>
            @else
                <h1 class="fw-bold">Login into backoffice</h1>

                <div class="my-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email"
                                   id="email"
                                   class="form-control @error('signal') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                            >
                        </div>

                        <div class="mb-3">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password"
                                   class="form-control"
                                   id="pass"
                                   name="password"
                                   required
                            >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @endif

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
    </div>
@endsection
