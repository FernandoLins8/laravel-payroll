@extends('layouts.app')

@section('content')
    <h2 class="text-center">Employee's Services</h2>

    <form method="post" action="{{ route('store-service') }}" class="py-2">
        @csrf
        
        <h3 class="py-2">Employee's Info</h3>
        <div class="d-flex justify-content-between">
            <div class="mb-4 w-75">
                <label for="employee-id" class="form-label">Employee Id</label>
                <input type="number" step="1" class="form-control w-75" name="employee-id" id="employee-id" value="{{ $employee->id }}" readonly>
            </div>

            <div class="mb-4 w-75">
                <label for="employee-name" class="form-label">Employee Name</label>
                <input type="text" class="form-control w-75" name="employee-name" id="employee-name" value="{{ $employee->name }}" readonly> 
            </div>
        </div>

        <div class="mb-4 w-50">
            <label for="employee-name" class="form-label">Employee Union Registration</label>
            <input type="text" class="form-control w-75" name="union-id" id="union-id" value="{{ $employee->union_id }}" readonly> 
        </div>

        <hr>

        <h3 class="py-3">Register new service</h3>
        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control w-50" name="description" id="description" placeholder="Service description">
        </div>

        <div class="mb-4">
            <label for="tax" class="form-label">Value</label>
            <input type="number" step="0.01" class="form-control w-25" name="tax" id="tax" placeholder="Service tax"> 
        </div>

        <div class="mb-4">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control w-25" name="date" id="date" value="{{ date('Y-m-d') }}">
        </div>
        
        <button type="submit" class="btn bg-primary text-white">Add service</button>
    </form>

    <hr>

    <h3>Services</h3>
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
            @foreach($employee->union->services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->description }}</td>
                    <td>{{ $service->tax }}</td>
                    <td>{{ $service->date }}</td>
                    <td>
                        <form method="post" action="{{ route('destroy-service', $service->id) }}">
                            @csrf
                            @method('delete')    
                            <button class="btn btn-danger text-white py-1 px-3">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

