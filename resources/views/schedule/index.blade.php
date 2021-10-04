@extends('layouts.app')

@section('content')
<div class="w-100">
    <h3>Schedules</h3>

    <h4 class="mt-2">Default schedules</h4>
    <table class="w-75 table my-3 table-hover">
        <thead class="table-dark">
            <tr>
            <th class="w-50" scope="col">Schedule</th>
            <th class="w-50" scope="col">Assigned to</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 0; $i < 3; $i++)
                <tr>
                    <td>{{ $schedules[$i]->description }}</td>
                    <td>1</td>
                </tr>
            @endfor
        </tbody>
    </table>

    <h4 class="mt-5">Weekly schedules</h4>
    <table class="w-75 table my-3 table-hover">
        <thead class="table-dark">
            <tr>
            <th class="w-50" scope="col">Schedule</th>
            <th class="w-25" scope="col">Assigned to</th>
            <th class="w-25 text-center" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                @if($schedule->type === 'weekly' && $schedule->id > 3)
                    <tr>
                        <td>{{ $schedule->description }}</td>
                        <td>1</td>
                        <form method="post" action="{{ route('destroy-schedule', $schedule->id) }}">
                            @csrf
                            @method('delete')
                            <td><button type="submit" class="btn bg-danger text-white py-1 px-3">Delete</button></td>
                        </form>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>    

    <h4 class="mt-5">Monthly schedules</h4>
    <table class="w-75 table my-3 table-hover">
        <thead class="table-dark">
            <tr>
            <th class="w-50" scope="col">Schedule</th>
            <th class="w-25" scope="col">Assigned to</th>
            <th class="w-25 text-center" scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($schedules as $schedule)
                @if($schedule->type === 'monthly' && $schedule->id > 3)
                    <tr>
                        <td>{{ $schedule->description }}</td>
                        <td>1</td>
                        <form method="post" action="{{ route('destroy-schedule', $schedule->id) }}">
                            @csrf
                            @method('delete')
                            <td><button type="submit" class="btn bg-danger text-white py-1 px-3">Delete</button></td>
                        </form>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>    

    <br>
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

