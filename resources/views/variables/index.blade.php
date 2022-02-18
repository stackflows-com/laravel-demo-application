@extends('layouts.master')

@section('title', 'Variables')

@section('content')
    <div class="container">
        <div class="d-flex  align-items-center mt-5 mb-2">
            <h1>Variables</h1>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Value(s)</th>
                <th scope="col">Option(s)</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach($variables as $variable)
                    <tr>
                        <td scope="col">{{ $variable->getId() }}</td>
                        <td scope="col">{{ $variable->getName() }}</td>
                        <td scope="col">{{ $variable->getType() }}</td>
                        <td scope="col">{{ $variable->getValues() }}</td>
                        <td scope="col">
                            @forelse($variable->getOptions() as $optionName => $value)
                                <div>{{ $optionName }} : {{ (string) $value }}</div>
                            @empty
                                -
                            @endforelse
                        </td>
                        <td>
                            <a class="btn" href="{{ route('variables.edit', $variable->getId()) }}">Edit</a>
                            <form method="POST" action="{{ route('variables.destroy', $variable->getId()) }}">
                                {{ csrf_field() }}
                                {{ method_field('delete') }}
                                <button type="submit">Destroy</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
