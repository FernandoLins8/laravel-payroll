@extends('layouts.app')

@section('content')
    <h3>Timecard</h3>

    <table class="table w-75 my-3 table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($hourlyEmployees as $hourly)
            <tr>
                <td>{{ $hourly->employee_id }}</td>
                <td>{{ $hourly->employee->name }}</td>
                <td>
                    <a class="btn btn-info text-white py-1 px-3" href="{{ route('list-by-employee', ['id' => $hourly->employee_id]) }}">Select</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection

