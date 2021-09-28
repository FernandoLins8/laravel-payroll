@extends('layouts.app')

@section('content')
    <h3>Sell</h3>

    <form action="">
        <h4 class="py-2">Register Employee's Sell</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="text" step="1" class="form-control" id="employee-id" placeholder="Type employee's id">
        </div>

        <a class="btn bg-primary text-white text-decoration-none" href="/sell/create">Select</a>
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
