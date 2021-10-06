@extends('layouts.app')

@section('content')
    <h3>Employees</h3>
    <h4>Employee info</h4>
    
    <div class="mb-4 w-75">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" id="id" readonly value="{{ $employee->id }}">
    </div>
    
    <div class="mb-4 w-75">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" readonly value="{{ $employee->name }}">
    </div>
    
    <div class="mb-4 w-75">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" rows="3" readonly>{{ $employee->address }}</textarea>
    </div>

    <div class="mb-4 w-75">
        <label for="payment_method" class="form-label">Payment Method</label>
        <input type="text" id="payment_method" class="form-control" readonly value="{{ $employee->payment_method->description }}">
    </div>

    <div class="mb-4 w-75">
        <label for="type" class="form-label">Type</label>
        <input type="text" id="type" class="form-control" readonly value="{{ $employee->type->description }}">
    </div>

    @if($employee->union_id)
        <div class="mb-4 w-75">
            <label for="union-id" class="form-label">Union Id</label>
            <input type="text" id="union-id" class="form-control" readonly value="{{ $employee->union_id }}">
        </div>

        <div class="mb-4 w-75">
            <label for="union-tax" class="form-label">Union Tax</label>
            <input type="text" id="union-tax" class="form-control" readonly value="{{ $employee->union->union_tax }}">
        </div>
    @else
        <div class="mb-4 w-75">
            <label for="union" class="form-label">Union</label>
            <input type="text" id="union" class="form-control" readonly value="Employee is not a union member">
        </div>
    @endif

    @if($employee->type->description === 'Salaried')
        <div class="mb-4 w-75">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" id="salary" class="form-control" readonly value="{{ $employee->salaried->salary }}">
        </div>
    @endif

    @if($employee->type->description === 'Commissioned')
        <div class="mb-4 w-75">
            <label for="base-salary" class="form-label">Base Salary</label>
            <input type="text" id="base-salary" class="form-control" readonly value="{{ $employee->commissioned->base_salary }}">
        </div>

        <div class="mb-4 w-75">
            <label for="commission-tax" class="form-label">Commission Tax</label>
            <input type="text" id="commission-tax" class="form-control" readonly value="{{ $employee->commissioned->commission_tax }}">
        </div>
    @endif

    @if($employee->type->description === 'Hourly')
        <div class="mb-4 w-75">
            <label for="hourly-salary" class="form-label">Hourly Salary</label>
            <input type="text" id="hourly-salary" class="form-control" readonly value="{{ $employee->hourly->hourly_salary }}">
        </div>
    @endif

    <a href="{{ route('edit-employee', $employee->id) }}" class="btn btn-primary text-white">Editar</a>
@endsection
