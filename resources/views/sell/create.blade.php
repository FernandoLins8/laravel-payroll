@extends('layouts.app')

@section('content')
    <h3>Sell</h3>
    
    <form method="post" action="{{ route('store-sell') }}">
        @csrf
        <h4 class="py-2">Register Employee's Sell</h4>
        <div class="mb-4 w-75">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="number" step="1" class="form-control" name="employee-id" id="employee-id" value="{{ $employee->id }}" readonly>
        </div>

        <div class="mb-4 w-75">
            <label for="employee-name" class="form-label">Employee Name</label>
            <input type="ext" class="form-control" id="employee-name" value="{{ $employee->name }}" disabled> 
        </div>

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


    <script defer>
        // Change selected link navbar
        const navbarLinks = document.querySelectorAll('#navbar ul li a')
        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        const currentLink = document.querySelector('#sell-page')
        currentLink.classList.remove('text-dark')
    </script>
@endsection

