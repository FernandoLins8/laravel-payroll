@extends('layouts.app')

@section('content')
    <h2>Service</h2>

    <table class="table w-75 my-3 table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>
                        <a class="btn btn-info text-white" href="{{ route('list-services-by-employee', $employee->id) }}">Select</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
