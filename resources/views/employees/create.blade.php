@extends('layouts.app')

@section('content')
    <h3>Employees</h3>

    <form method="post" action="{{ route('store-employee') }}">
        @csrf
        <h4>Create new Employee</h4>
        <div class="mb-4 w-75">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Type employee's name" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-4 w-75">
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Type employee's address">{{ old('address') }}</textarea>
            @error('address')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4 w-50">
            <label for="payment-method-id" class="form-label">Payment Method</label>
            <select id="payment-method-id" name="payment-method-id" class="form-select">
                <option selected hidden disabled>Choose employee's payment method</option>
                @foreach($paymentMethods as $method)
                    <option value="{{ $method->id }}" @if(old('payment-method-id') == $method->id) selected @endif>{{ $method->description }}</option>
                @endforeach
            </select>
            @error('payment-method-id')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-75 d-flex justify-content-start">
            <div class="mb-4">
                <label name="union" for="union">Employee affiliated with union?</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="union" id="not-at-union" value="false" checked>
                    <label class="form-check-label" for="not-at-union">
                        Not affiliated
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="union" id="at-union" value="true">
                    <label class="form-check-label" for="at-union">
                        Affiliated
                    </label>
                </div>
            </div>

            <div class="mx-auto">
                <div class="mb-4">
                    <label for="union-tax" class="form-label">Union tax</label>
                    <input type="text" class="form-control" name="union-tax" id="union-tax" placeholder="0.00" value="0.00" disabled>

                    @error('union-tax')
                        <div class="text-danger p-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>

        <div class="mb-4 w-25">
            <label for="employee-type" class="form-label">Employee Type</label>
            <select id="employee-type" name="employee-type" class="form-select">
                <option selected hidden disabled>Select employee's type</option>
                @foreach($employeeTypes as $type)
                    <option value="{{ $type->description }}">{{ $type->description }}</option>
                @endforeach
            </select>
            @error('employee-type')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror
            
            @error('salary')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror
            
            @error('base-salary')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror

            @error('commission-tax')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror

            @error('hourly-salary')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="w-50 d-none salaried-section hidden-section mb-4">
            <label for="salary" class="form-label">Salary</label>
            <input type="number" step="0.01" class="form-control" id="salary" name="salary" placeholder="Salary" value="{{ old('salary') }}">
        </div>

        <div class="w-50 d-none commissioned-section hidden-section mb-4">
            <label for="base-salary" class="form-label">Base Salary</label>
            <input type="number" step="0.01" class="form-control" id="base-salary" name="base-salary" placeholder="Base salary" value="{{ old('base-salary') }}">
        </div>

        <div class="w-50 d-none commissioned-section hidden-section mb-4">
            <label for="commission-tax" class="form-label">Commission Tax</label>
            <input type="number" step="0.01" class="form-control" id="commission-tax" name="commission-tax" placeholder="Commission per sell" value="{{ old('commission-tax') }}">
        </div>

        <div class="w-50 d-none hourly-section hidden-section mb-4">
            <label for="hourly-salary" class="form-label">Hourly Salary</label>
            <input type="number" step="0.01" class="form-control" id="hourly-salary" name="hourly-salary" placeholder="Salary per hour" value="{{ old('hourly-salary') }}">
        </div>

        <button type="submit" class="btn bg-primary text-white">Save</button>
    </form>

    <script defer>
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

            if(value === 'Salaried' ) {
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

