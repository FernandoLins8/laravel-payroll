@extends('layouts.app')

@section('content')
    <h3>Timecard</h3>

    <form method="post" action="{{ route('store-timecard') }}">
        @csrf
        
        <h4 class="py-2">Add timecard for today's date</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="number" step="1" class="form-control" name="employee-id" id="employee-id" value="{{ $employee->id }}" readonly>
        </div>

        <div class="mb-4">
            <label for="employee-name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" name="employee-name" id="employee-name" value="{{ $employee->name }}" readonly> 
        </div>

        <div class="mb-4">
            <label for="working-hours" class="form-label">Today's working hours</label>
            <input type="number" step="0.01" class="form-control" name="working-hours" id="working-hours" placeholder="Type the amount of hours worked today">
        </div>
        
        <button class="btn bg-primary text-white">Add timecard</button>
    </form>


    <script defer>
        // Change selected link navbar
        const navbarLinks = document.querySelectorAll('#navbar ul li a')
        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        const currentLink = document.querySelector('#timecard-page')
        currentLink.classList.remove('text-dark')
    </script>
@endsection

