@extends('layouts.app')

@section('content')
    <h3>Employees</h3>

    <form action="">
        <h4>Create new Employee</h4>
        
        <div class="mb-4">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Type employee's name">
        </div>
        
        <div class="mb-4">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" rows="3" placeholder="Type employee's address"></textarea>
        </div>

        <div class="mb-4">
            <label for="payment_method" class="form-label">Payment Method</label>
            <select id="payment_method" class="form-select">
                <option selected hidden disabled>Choose employee's payment method</option>
                <option value="Check-sent-by-mail">Check sent by mail</option>
                <option value="Check-given-in-person">Check given in person</option>
                <option value="Bank-account-deposit">Bank account deposit</option>
            </select>
        </div>

        <div class="d-flex justify-content-start">
            <div class="mb-4">
                <label name="union" for="union">Employee affiliated with union?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="union" id="not-at-union" checked>
                    <label class="form-check-label" for="not-at-union">
                        Not affiliated
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="union" id="at-union">
                    <label class="form-check-label" for="at-union">
                        Affiliated
                    </label>
                </div>
            </div>

            <div class="mx-auto">
                <div class="mb-4">
                    <label for="union-tax" class="form-label">Union tax</label>
                    <input type="text" class="form-control" id="union-tax" placeholder="0.00" disabled>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="employee-type" class="form-label">Employee Type</label>
            <select id="employee-type" class="form-select">
                <option selected hidden disabled>Select employee's type</option>
                <option value="Salaried">Salaried</option>
                <option value="Commissioned">Commissioned</option>
                <option value="Hourly">Hourly</option>
            </select>
        </div>

        <div class="d-none salaried-section hidden-section mb-4">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" step="0.01" class="form-control" id="salary" placeholder="Type employee's Salary">
        </div>

        <div class="d-none commissioned-section hidden-section mb-4">
            <label for="base-salary" class="form-label">Base Salary</label>
            <input type="number" step="0.01" class="form-control" id="base-salary" placeholder="Type employee's base salary">
        </div>

        <div class="d-none commissioned-section hidden-section mb-4">
            <label for="commission-tax" class="form-label">Commission Tax</label>
            <input type="number" step="0.01" class="form-control" id="commission-tax" placeholder="Type employee's commission per sell">
        </div>

        <div class="d-none hourly-section hidden-section mb-4">
            <label for="hourly-salary" class="form-label">Hourly Salary</label>
            <input type="number" step="0.01" class="form-control" id="hourly-salary" placeholder="Type employee's salary per hour">
        </div>

        <button class="btn bg-primary text-white">Save</button>
    </form>

    <script defer>
        // Change selected link navbar
        const navbarLinks = document.querySelectorAll('#navbar ul li a')
        navbarLinks.forEach(item => {
            item.classList.add('text-dark')
        })
        const currentLink = document.querySelector('#employees-page')
        currentLink.classList.remove('text-dark')

        // toggle union tax
        // 
        const radioButtons = document.querySelectorAll('input[name=union]')
        radioButtons.forEach(button => {
            button.addEventListener('change', toggleUnionTax)
        })
        
        function toggleUnionTax() {
            const unionTax = document.querySelector('#union-tax')
            unionTax.disabled = !unionTax.disabled
        }

        // Toggle employee type section
        function showEmployeeTypeSection(e) {
            const value = e.target.value

            const hiddenSections = document.querySelectorAll('.hidden-section')
            hiddenSections.forEach(section => {
                section.classList.add('d-none')
            })

            if(value === 'Salaried') {
                const salariedSection = document.querySelector('.salaried-section')
                salariedSection.classList.remove('d-none')
            } else if(value === 'Commissioned') {
                const commissionedSections = document.querySelectorAll('.commissioned-section')
                commissionedSections.forEach(section => {
                    section.classList.remove('d-none')
                })
            } else if(value === 'Hourly') {
                const hourlySection = document.querySelector('.hourly-section')
                hourlySection.classList.remove('d-none')
            }
        }
        
        const employeeTypeSelect = document.querySelector('#employee-type')
        employeeTypeSelect.addEventListener('change', showEmployeeTypeSection)
    </script>
@endsection

