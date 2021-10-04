@extends('layouts.app')

@section('content')
    <h3>Sell</h3>

    <form method="post" action="{{ route('create-sell') }}">
        @csrf
        
        <h4 class="py-2">Register Employee's Sell</h4>
        <div class="mb-4">
            <label for="employee-id" class="form-label">Employee Id</label>
            <input type="text" step="1" class="form-control" name="employee-id" id="employee-id" placeholder="Type employee's id">
        </div>

        <button type="submit" class="btn bg-primary text-white text-decoration-none">Select</button>
    </form>
@endsection

