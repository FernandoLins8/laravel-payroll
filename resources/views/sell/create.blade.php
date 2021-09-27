@extends('layouts.app')

@section('content')
    <h3>Sell</h3>

    <form action="">
        <h4 class="py-2">Register Employee's Sell</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="number" step="1" class="form-control" id="employee-id" value="1" disabled>
        </div>

        <div class="mb-4">
            <label for="employee-name" class="form-label">Employee Name</label>
            <input type="text" class="form-control" id="employee-name" value="John Doe" disabled> 
        </div>

        <div class="mb-4">
            <label for="product-description" class="form-label">Description</label>
            <input type="text" class="form-control" id="product-description" placeholder="Product description">
        </div>

        <div class="mb-4">
            <label for="product-value" class="form-label">Value</label>
            <input type="number" step="0.01" class="form-control" id="product-value" placeholder="Product value"> 
        </div>
        
        <button class="btn bg-primary text-white">Add timecard</button>
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

