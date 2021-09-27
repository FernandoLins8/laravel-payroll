
@extends('layouts.app')



@section('content')
    <h3>Employees</h3>

    <table class="table my-3 table-hover">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Address</th>
            <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark Otto</td>
            <td>St Main aux, Maceio/AL</td>
            <td>Salaried</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Jacob Thornton</td>
            <td>Av teste, Maceio/AL</td>
            <td>Commissioned</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>Random Street n° 42</td>
            <td>Hourly</td>
            </tr>
        </tbody>
    </table>

    <button class="btn bg-primary text-white">Add new</button>

    <script defer>
        const navbarLinks = document.querySelectorAll('#navbar ul li a')

        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        
        const currentLink = document.querySelector('#employees-page')

        currentLink.classList.remove('text-dark')
    </script>
@endsection

