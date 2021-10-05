@extends('layouts.app')

@section('content')
    <h3>Service</h3>

    <form method="post" action="{{ route('create-service') }}">
        @csrf
        
        <h4 class="py-2">Register a service brought by an employee</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <select class="form-select w-50" name="employee-id" id="employee-id">
                <option hidden selected disabled>Select an employee from union</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->id }} | {{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn bg-primary text-white text-decoration-none">Select</button>
    </form>
@endsection

