@extends('layouts.app')

@section('content')
    <h2>Sell</h2>

    <table class="table w-75 my-3 table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $commissioned)
                <tr>
                    <td>{{ $commissioned->employee_id }}</td>
                    <td>{{ $commissioned->employee->name }}</td>
                    <td>
                        <a href="{{ route('list-sells-by-employee', $commissioned->employee_id) }}" class="btn btn-info text-white py-1 px-3">Select</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

