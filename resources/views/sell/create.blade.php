@extends('layouts.app')

@section('content')
    <h2 class="text-center">Employee's Sells</h2>

    <form method="post" action="{{ route('store-sell') }}" class="py-2">
        @csrf

        <h3 class="py-2">Employee's Info</h3>
        <div class="d-flex justify-content-between">
            <div class="mb-4 w-25">
                <label for="employee-id" class="form-label">Employee Id</label>
                <input type="number" step="1" class="form-control w-75" name="employee-id" id="employee-id" value="{{ $employee->id }}" readonly>
            </div>

            <div class="mb-4 w-75">
                <label for="employee-name" class="form-label">Employee Name</label>
                <input type="ext" class="form-control w-75" id="employee-name" value="{{ $employee->name }}" disabled> 
            </div>
        </div>
        
        <hr>

        <h3 class="py-3">Register new sell</h3>
        <div class="mb-4 w-50">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Product description">
        </div>

        <div class="mb-4 w-25">
            <label for="value" class="form-label">Value</label>
            <input type="number" step="0.01" class="form-control" name="value" id="value" placeholder="Product value"> 
        </div>

        <div class="mb-4">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control w-25" name="date" id="date" value="{{ date('Y-m-d') }}">
        </div>
        
        <button class="btn bg-primary text-white">Add Sell</button>
    </form>

    <hr>

    <h3 class="py-2">Sells</h3>
    <table class="table my-3 table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Description</th>
                <th>Value</th>
                <th>Date</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($employee->commissioned->sells->sortByDesc('date') as $sell)
                <tr>
                    <td>{{ $sell->id }}</td>
                    <td>{{ $sell->description }}</td>
                    <td>{{ $sell->value }}</td>
                    <td>{{ $sell->date }}</td>
                    <td>
                        <form method="post" action="{{ route('destroy-sell', $sell->id) }}">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger text-white py-1 px-3">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
@endsection
