@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('store-timecard') }}" class="py-2">
        @csrf

        <h2 class="text-center">Employee's Timecards</h2>
        <h3 class="py-2">Employee's Info</h3>
        <div class="d-flex justify-content-between">
            <div class="mb-4 w-25">
                <label for="employee-id" class="form-label">Employee Id</label>
                <input type="number" step="1" class="form-control w-75" name="employee-id" id="employee-id" value="{{ $employee->id }}" readonly>
            </div>

            <div class="mb-4 w-75">
                <label for="employee-name" class="form-label">Employee Name</label>
                <input type="text" class="form-control w-75" name="employee-name" id="employee-name" value="{{ $employee->name }}" readonly> 
            </div>
        </div>

        <hr>

        <h3 class="py-2">Add new timecard</h3>
        <div class="mb-4">
            <label for="working-hours" class="form-label">Working hours</label>
            <input type="number" step="0.01" class="form-control w-25" name="working-hours" id="working-hours" placeholder="Type the amount of hours worked">
        </div>
        
        <div class="mb-4">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control w-25" name="date" id="date" value="{{ date('Y-m-d') }}">
        </div>
        
        <button class="btn bg-primary text-white">Add timecard</button>
    </form>

    <hr>

    <h3 class="py-2">Timecards</h3>
    <table class="table my-3 table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Date</th>
                <th scope="col">Working Hours</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
        @foreach($employee->hourly->timecards->sortByDesc('date') as $timecard)
            <tr>
            <th scope="row">{{ $timecard->id }}</th>
            <td>{{ $timecard->date }}</td>
            <td>{{ $timecard->working_hours }}</td>
            <form method="post" action="{{ route('destroy-timecard', $timecard->id) }}">
                @csrf
                @method('delete')
                <td><button class="btn btn-danger text-white py-1 px-3">Delete</button></td>
            </form>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
