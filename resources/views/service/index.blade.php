@extends('layouts.app')

@section('content')
    <h3>Service</h3>

    <form method="post" action="{{ route('create-service') }}">
        @csrf
        
        <h4 class="py-2">Register a service brought by an employee</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="text" step="1" class="form-control" name="employee-id" id="employee-id" placeholder="Type employee's id">
        </div>

        <button type="submit" class="btn bg-primary text-white text-decoration-none">Select</button>
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

