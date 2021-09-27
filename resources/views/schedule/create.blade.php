@extends('layouts.app')

@section('content')
    <h3>Schedules</h3>

    <form action="">
        <div class="my-5">
            <label name="schedule-type" for="schedule-type">Schedule Type:</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="schedule-type" id="monthly-schedule" checked>
                <label class="form-check-label" for="monthly-schedule">
                    Monthly
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="schedule-type" id="weekly-schedule">
                <label class="form-check-label" for="weekly-schedule">
                    Weekly
                </label>
            </div>
        </div>

        <div class="d-none monthly-section">
            <h4>Monthly Schedule</h4>
            <div class="mb-4 me-5">
                <label for="frequency" class="form-label">Payment Day</label>
                <select id="frequency" class="form-select">
                    <option selected hidden disabled>Choose payment day</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="$">$</option>
                </select>
            </div>
        </div>

        <div class="d-none weekly-section">
            <h4>Weekly Schedule</h4>
            <div class="d-flex">
                <div class="mb-4 me-5">
                    <label for="frequency" class="form-label">Frequency Between Payments</label>
                    <select id="frequency" class="form-select">
                        <option selected hidden disabled>Choose payment frequency</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
    
                <div class="mb-4">
                    <label for="weekday" class="form-label">Payment Day</label>
                    <select id="weekday" class="form-select">
                        <option selected hidden disabled>Choose Payment Day</option>
                        <option value="Sunday">Sunday</option>
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div>
            </div>
        </div>
        
        <button class="btn bg-primary text-white">Add new schedule</button>
    </form>


    <script defer>
        // Change selected link navbar
        const navbarLinks = document.querySelectorAll('#navbar ul li a')
        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        const currentLink = document.querySelector('#service-page')
        currentLink.classList.remove('text-dark')

        // toggle hidden section
        // 
        const radioButtons = document.querySelectorAll('input[name=schedule-type]')
        radioButtons.forEach(button => {
            button.addEventListener('change', toggleScheduleType)
        })
        
        function toggleScheduleType(e) {
            const value = e.target.id

            const monthlySection = document.querySelector('.monthly-section')
            const weeklySection = document.querySelector('.weekly-section')
            
            if(value === 'monthly-schedule') {
                monthlySection.classList.remove('d-none')
                weeklySection.classList.add('d-none')
            } else if(value === 'weekly-schedule') {
                weeklySection.classList.remove('d-none')
                monthlySection.classList.add('d-none')
            }
        }

    </script>
@endsection
