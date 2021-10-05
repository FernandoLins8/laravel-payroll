@extends('layouts.app')

@section('content')
    <h3>Timecard</h3>

    <form method="post" action="{{ route('create-timecard') }}">
        @csrf
        <h4 class="py-2">Add timecard for today's date</h4>

        <div class="mb-4">
            <select class="form-select w-50" name="employee-id" id="employee-id">
                <option disabled selected>Select an hourly employee</option>
            @foreach($hourlyEmployees as $hourly)
                <option value="{{ $hourly->employee_id }}">{{ $hourly->employee_id }} | {{ $hourly->employee->name }}</option>
            @endforeach
            </select>
        </div>

        <button class="btn bg-primary text-white text-decoration-none">Select</button>
    </form>
@endsection

