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
      </div>
      
      <div class="mb-4 w-75">
          <label for="address" class="form-label">Address</label>
          <textarea class="form-control" name="address" id="address" rows="3">{{ $employee->address }}</textarea>
      </div>
  
      <div class="mb-4 w-25">
          <label for="payment-method" class="form-label">Payment Method</label>
          <select class="form-select" name="payment-method" id="payment-method">
            @foreach($paymentMethods as $method)
              <option value="{{ $method->id }}" {{ $method->id == $employee->payment_method->id ? 'selected' : ''}}>{{ $method->description }}</option>
            @endforeach
          </select>
      </div>
        <button class="btn btn-primary" type="submit">Save</button>
    </form>
@endsection

