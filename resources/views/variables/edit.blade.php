@extends('layouts.master')

@section('title', 'Update variable ' . $variable->getName())

@section('content')
    <div class="container">
        <div class="d-flex  align-items-center mt-5 mb-2">
            <h1>Update variable {{ $variable->getName() }}</h1>
        </div>
        <form method="POST" action="{{ route('variables.update', $variable->getId()) }}">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{ csrf_field() }}
            {{ method_field('put') }}

            <div class="form-group">
                <label for="name">Name : </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Variable name" value="{{ old('name', $variable->getName()) }}">
            </div>

            <div class="form-group">
                <label for="type">Type : </label>
                <select class="form-control" id="type" name="type">
                    @foreach($types as $name => $type)
                        <option value="{{ $name }}" @if(old('type', $variable->getType()) === $name) selected="selected" @endif>
                            {{ $type['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="values">Value(s) : </label>
                <textarea class="form-control" id="values" name="values" placeholder="Variable value(s)">{{ old('values', $variable->getValues()) }}</textarea>
            </div>

            <div class="form-group">
                <label for="options">Option(s) : </label>
                <textarea class="form-control" id="options" name="options" placeholder="Variable option(s)">{{ old('options', json_encode($variable->getOptions())) }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
