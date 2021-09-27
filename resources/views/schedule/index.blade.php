@extends('layouts.app')

@section('content')
<div class="w-100">
        
        <h3>Schedules</h3>
        <h4 class="mt-5">Monthly schedules</h4>
    
        <table class="table my-3 table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">Schedule</th>
                <th scope="col">Active</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td>Monthly $</td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    </div>
                </td>
                </tr>
                <tr>
                <td>Jacob Thornton</td>
                <td>Av teste, Maceio/AL</td>
                </tr>
                <tr>
                <td>Larry the Bird</td>
                <td>Random Street n° 42</td>
                </tr>
            </tbody>
        </table>
    
        <a class="btn bg-primary text-white text-decoration-none" href="/schedule/create">Add new</a>
    </div>

    <script defer>
        // Change selected link navbar
        const navbarLinks = document.querySelectorAll('#navbar ul li a')
        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        const currentLink = document.querySelector('#schedule-page')
        currentLink.classList.remove('text-dark')
    </script>
@endsection

