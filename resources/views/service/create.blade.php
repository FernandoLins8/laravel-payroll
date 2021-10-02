@extends('layouts.app')

@section('content')
    <h3>Service</h3>

    <form method="post" action="{{ route('store-service') }}">
        @csrf
        
        <h4 class="py-2">Register a service brought by an employee</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="number" step="1" class="form-control" name="employee-id" id="employee-id" value="{{ $employee->id }}" disabled>
        </div>

        <div class="mb-4">
            <label for="employee-name" class="form-label">Employee Union Registration</label>
            <input type="text" class="form-control" name="union-id" id="union-id" value="{{ $employee->union_id }}" readonly> 
        </div>

        <div class="mb-4">
            <label for="employee-name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" name="employee-name" id="employee-name" value="{{ $employee->name }}" disabled> 
        </div>

        <div class="mb-4">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Service description">
        </div>

        <div class="mb-4">
            <label for="tax" class="form-label">Value</label>
            <input type="number" step="0.01" class="form-control" name="tax" id="tax" placeholder="Service tax"> 
        </div>
        
        <button type="submit" class="btn bg-primary text-white">Add service</button>
    </form>


    <script defer>
        // Change selected link navbar
        const navbarLinks = document.querySelectorAll('#navbar ul li a')
        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        const currentLink = document.querySelector('#service-page')
        currentLink.classList.remove('text-dark')
    </script>
@endsection

