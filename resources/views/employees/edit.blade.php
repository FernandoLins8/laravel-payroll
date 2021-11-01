@extends('layouts.app')

@section('content')
  <h3>Employees</h3>
  <h4>Edit employee info</h4>
  
  <form method="post" action="{{ route('update-employee', $employee->id) }}">
    @csrf
    @method('put')
    
    <div class="mb-4 w-75">
        <label for="id" class="form-label">Id</label>
        <input type="text" class="form-control" id="id" readonly value="{{ $employee->id }}">
    </div>
    
    <div class="mb-4 w-75">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $employee->name }}">
        @error('name')
          <div class="text-danger p-1">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-4 w-75">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" name="address" id="address" rows="3">{{ $employee->address }}</textarea>
        @error('address')
          <div class="text-danger p-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-4 w-50">
        <label for="payment-method-id" class="form-label">Payment Method</label>
        <select class="form-select" name="payment-method-id" id="payment-method-id">
          @foreach($paymentMethods as $method)
            <option value="{{ $method->id }}" {{ $method->id == $employee->payment_method->id ? 'selected' : ''}}>{{ $method->description }}</option>
          @endforeach
        </select>
        @error('payment-method')
          <div class="text-danger p-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="w-75 d-flex justify-content-start">
      <div class="mb-4">
        <label name="union" for="union">Employee affiliated with union?</label>
        <div class="form-check">
            <input 
              class="form-check-input"
              type="radio"
              name="union"
              id="not-at-union"
              value="false"
              @if(!$employee->union) checked @endif
            >
            <label class="form-check-label" for="not-at-union">
                Not affiliated
            </label>
        </div>
        <div class="form-check">
            <input 
              class="form-check-input"
              type="radio"
              name="union"
              id="at-union"
              value="true"
              @if($employee->union) checked @endif
            >
            <label class="form-check-label" for="at-union">
                Affiliated
            </label>
        </div>
      </div>

      <div class="mx-auto">
          <div class="mb-4">
            <label for="union-tax" class="form-label">Union tax</label>
            <input 
            type="text"
            class="form-control"
            name="union-tax"
            id="union-tax"
            @if($employee->union)
              value="{{ $employee->union->union_tax }}"
            @else
              value="0.00"
              disabled
            @endif 
          >
            @error('union-tax')
                <div class="text-danger p-1">{{ $message }}</div>
            @enderror
          </div>
      </div>
    </div>

    <div class="w-50 mb-4">
      <label for="union-id" class="form-label">Union Id</label>
      <input 
        class="form-control"
        type="text"
        id="union-id"
        name="union-id"
        @if($employee->union)
          value="{{ $employee->union->id }}"
        @else
          value="{{ old('union-id') }}"
          disabled
        @endif
      >
      @error('union-id')
        <div class="text-danger p-1">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-4 w-25">
      <label for="employee-type" class="form-label">Employee Type</label>
      <select id="employee-type" name="employee-type" class="form-select">
          <option selected hidden disabled>Select employee's type</option>
          {{ $employee->type->id }}
          @foreach($employeeTypes as $type)
              <option 
                value="{{ $type->description }}" 
                {{ $employee->type->id == $type->id ? 'selected' : '' }}
              >
                {{ $type->description }}
              </option>
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

    @if($employee->salaried)
      <div class="w-50 salaried-section hidden-section mb-4">
          <label for="salary" class="form-label">Salary</label>
          <input type="number" step="0.01" class="form-control" id="salary" name="salary" placeholder="Salary" value="{{ $employee->salaried->salary }}">
      </div>
    @else
      <div class="w-50 d-none salaried-section hidden-section mb-4">
          <label for="salary" class="form-label">Salary</label>
          <input type="number" step="0.01" class="form-control" id="salary" name="salary" placeholder="Salary" value="{{ old('salary') }}">
      </div>
    @endif

    @if($employee->commissioned)
      <div class="w-50 commissioned-section hidden-section mb-4">
          <label for="base-salary" class="form-label">Base Salary</label>
          <input type="number" step="0.01" class="form-control" id="base-salary" name="base-salary" placeholder="Base salary" value="{{ $employee->commissioned->base_salary }}">
      </div>
      <div class="w-50 commissioned-section hidden-section mb-4">
        <label for="commission-tax" class="form-label">Commission Tax</label>
        <input type="number" step="0.01" class="form-control" id="commission-tax" name="commission-tax" placeholder="Commission per sell" value="{{ $employee->commissioned->commission_tax }}">
      </div>
    @else
      <div class="w-50 d-none commissioned-section hidden-section mb-4">
          <label for="base-salary" class="form-label">Base Salary</label>
          <input type="number" step="0.01" class="form-control" id="base-salary" name="base-salary" placeholder="Base salary" value="{{ old('base-salary') }}">
      </div>
      <div class="w-50 d-none commissioned-section hidden-section mb-4">
        <label for="commission-tax" class="form-label">Commission Tax</label>
        <input type="number" step="0.01" class="form-control" id="commission-tax" name="commission-tax" placeholder="Commission per sell" value="{{ old('commission-tax') }}">
      </div>
    @endif

    @if($employee->hourly)
    <div class="w-50 hourly-section hidden-section mb-4">
        <label for="hourly-salary" class="form-label">Hourly Salary</label>
        <input type="number" step="0.01" class="form-control" id="hourly-salary" name="hourly-salary" placeholder="Salary per hour" value="{{ $employee->hourly->hourly_salary }}">
    </div>
    @else
    <div class="w-50 d-none hourly-section hidden-section mb-4">
        <label for="hourly-salary" class="form-label">Hourly Salary</label>
        <input type="number" step="0.01" class="form-control" id="hourly-salary" name="hourly-salary" placeholder="Salary per hour" value="{{ old('hourly-salary') }}">
    </div>
    @endif
    
    <button class="btn btn-primary" type="submit">Save</button>
  </form>

  <script src="{{ URL::asset('js/toggleUnion.js') }}" defer></script>
  <script src="{{ URL::asset('js/toggleEmployeeType.js') }}" defer></script>
@endsection
