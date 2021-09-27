@extends('layouts.app')

@section('content')
    <div class="w-100">
        
        <h3>Employees</h3>
    
        <table class="table my-3 table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Type</th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>Mark Otto</td>
                <td>St Main aux, Maceio/AL</td>
                <td>Salaried</td>
                <td><button class="btn bg-info text-white py-1 px-3">Details</button></td>
                <td><button class="btn bg-danger text-white py-1 px-3">Delete</button></td>
                </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob Thornton</td>
                <td>Av teste, Maceio/AL</td>
                <td>Commissioned</td>
                <td><button class="btn bg-info text-white py-1 px-3">Details</button></td>
                <td><button class="btn bg-danger text-white py-1 px-3">Delete</button></td>
                </tr>
                <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Random Street n° 42</td>
                <td>Hourly</td>
                <td><button class="btn bg-info text-white py-1 px-3">Details</button></td>
                <td><button class="btn bg-danger text-white py-1 px-3">Delete</button></td>
                </tr>
            </tbody>
        </table>
    
        <a class="btn bg-primary text-white text-decoration-none" href="/employee/create">Add new</a>
    </div>

    <script defer>
        const navbarLinks = document.querySelectorAll('#navbar ul li a')
        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        const currentLink = document.querySelector('#employees-page')
        currentLink.classList.remove('text-dark')

        // 
        // Delete employee checkout
        function removeEmployee() {
            const choice = confirm('Do you want to remove the employee?')

            if(choice) {
                alert('Employee removed')
            }
        }
        
        const deleteButtons = document.querySelectorAll('.bg-danger')
        deleteButtons.forEach(button => {
            button.addEventListener('click', removeEmployee)
        })

    </script>
@endsection

