@extends('layouts.app')

@section('content')
    <div class="w-100">
        
        <h3>Employees</h3>
    
        <table class="table my-3 table-hover">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                    <td scope="row">{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->type->description }}</td>
                    <td><a class="btn btn-info text-white py-1 px-3" href="{{ route('show-employee', $employee->id) }}">Details</a></td>
                    <form method="post" action="{{ route('destroy', $employee->id) }}">
                        @csrf
                        @method('delete')
                        <td><button class="btn btn-danger text-white py-1 px-3">Delete</button></td>
                    </form>
                    </tr>
                @endforeach
            </tbody>
        </table>

    
        <a class="btn btn-primary text-white text-decoration-none" href="{{ route('create-employee') }}">Add new</a>
    </div>

    <script defer>
        // Delete employee checkout
        function removeEmployee(e) {
            const removeEmp = confirm('Are you sure?')

            if(!removeEmp) {
                e.preventDefault()
            }
        }
        
        const deleteButtons = document.querySelectorAll('.btn-danger')
        deleteButtons.forEach(button => {
            button.addEventListener('click', removeEmployee)
        })
    </script>
@endsection

