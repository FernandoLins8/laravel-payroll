@extends('layouts.app')

@section('content')
    <h3>Timecard</h3>

    <form method="post" action="{{ route('create-timecard') }}">
        @csrf

        <h4 class="py-2">Add timecard for today's date</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="text" step="1" class="form-control" name="employee-id" id="employee-id" placeholder="Type employee's id">
        </div>

        <button class="btn bg-primary text-white text-decoration-none">Select</button>
    </form>
@endsection

