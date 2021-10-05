@extends('layouts.app')

@section('content')
    <h3>Sell</h3>

    <form method="post" action="{{ route('create-sell') }}">
        @csrf
        
        <h4 class="py-2">Register Employee's Sell</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <select class="form-select w-50" name="employee-id" id="employee-id">
                <option hidden selected disabled value="">Select an commissioned employee</option>
                @foreach($employees as $commissioned)
                    <option value="{{ $commissioned->employee_id }}">{{ $commissioned->employee_id }} | {{ $commissioned->employee->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn bg-primary text-white text-decoration-none">Select</button>
    </form>
@endsection

