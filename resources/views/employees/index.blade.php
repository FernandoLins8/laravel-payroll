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
                @foreach($employees as $employee)
                    <tr>
                    <th scope="row">{{ $employee->id }}</th>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->type }}</td>
                    <td><button class="btn bg-info text-white py-1 px-3">Details</button></td>
                    <form method="post" action="{{ route('destroy', $employee->id) }}">
                        @csrf
                        @method('delete')
                        <td><button class="btn bg-danger text-white py-1 px-3">Delete</button></td>
                    </form>
                    </tr>
                @endforeach
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
        function removeEmployee(e) {
            const removeEmp = confirm('Are you sure?')

            if(!removeEmp) {
                e.preventDefault()
            }
        }
        
        const deleteButtons = document.querySelectorAll('.bg-danger')
        deleteButtons.forEach(button => {
            button.addEventListener('click', removeEmployee)
        })

    </script>
@endsection

