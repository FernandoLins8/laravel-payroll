@extends('layouts.app')

@section('content')
<div class="w-100">
        
        <h3>Schedules</h3>
        <h4 class="mt-5">Monthly schedules</h4>
    
        <table class="table my-3 table-hover">
            <thead class="table-dark">
                <tr>
                <th scope="col">Schedule</th>
                <th scope="col">Assigned</th>
                <th scope="col">Active</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ $schedule->description }}</td>
                        <td>1</td>
                        <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            </div>
                        </td>
                        @if($schedule->id > 3)
                            <form method="post" action="{{ route('destroy-schedule', $schedule->id) }}">
                                @csrf
                                @method('delete')
                                <td><button type="submit" class="btn bg-danger text-white py-1 px-3">Delete</button></td>
                            </form>
                        @endif
                    </tr>
                @endforeach
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


        // 
        // Delete schedule checkout
        function removeSchedule(e) {
            const removeSchedule = confirm('Are you sure?')

            if(!removeSchedule) {
                e.preventDefault()
            }
        }
        
        const deleteButtons = document.querySelectorAll('.bg-danger')
        deleteButtons.forEach(button => {
            button.addEventListener('click', removeSchedule)
        })
    </script>
@endsection

