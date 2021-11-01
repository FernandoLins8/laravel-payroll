<?php

namespace App\Http\Controllers;

use App\Models\Hourly;
use App\Models\Employee;
use App\Models\Salaried;
use App\Models\Commissioned;
use App\Models\EmployeeType;
use App\Models\PaymentMethod;
use App\Models\UnionRegistration;
use App\Http\Requests\StoreEmployeeRequest;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();

        return view('employees.index', [
            'employees' => $employees,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paymentMethods = PaymentMethod::all();
        $employeeTypes = EmployeeType::all();

        return view('employees.create', [
            'employeeTypes' => $employeeTypes,
            'paymentMethods' => $paymentMethods
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employeeType = request('employee-type');
        $employeeTypeId = EmployeeType::where('description', $employeeType)->first()->id;

        $salaried = new Salaried();
        $commissioned = new Commissioned();
        $hourly = new Hourly();

        if($employeeType === 'Salaried')
        {
            $schedule = 1;
            $salaried->salary = request('salary');
        } else if($employeeType === 'Commissioned')
        {
            $schedule = 2;
            $commissioned->base_salary = request('base-salary');
            $commissioned->commission_tax = request('commission-tax');
        } else if($employeeType === 'Hourly') {
            $schedule = 3;
            $hourly->hourly_salary = request('hourly-salary');
        }

        $unionFiliated = request('union');
        $unionId = null;

        if($unionFiliated === "true") {
            $unionId = Str::uuid()->toString();
            UnionRegistration::create([
                'id' => $unionId,
                'union_tax' => request('union-tax')
            ]);
        }

        $employee = Employee::create([
            'name' => request('name'),
            'address' => request('address'),
            'payment_method_id' => request('payment-method-id'),
            'employee_type_id' => $employeeTypeId,
            'schedule_id' => $schedule,
            'union_id' => $unionId
        ]);

        if($employeeType === 'Salaried')
        {
            $salaried->employee_id = $employee->id;
            $salaried->save();
        } else if($employeeType === 'Commissioned')
        {
            $commissioned->employee_id = $employee->id;
            $commissioned->save();
        } else if($employeeType === 'Hourly') {
            $hourly->employee_id = $employee->id;
            $hourly->save();
        }
 
        return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('employees.show', ['employee' => $employee]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::where('id', $id)->first();
        $paymentMethods = PaymentMethod::all();
        $employeeTypes = EmployeeType::all();
        
        return view('employees.edit', [
            'employee' => $employee,
            'paymentMethods' => $paymentMethods,
            'employeeTypes' => $employeeTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $employee = Employee::where('id', $id)->first();

        $employee->name = request('name');
        $employee->address = request('address');
        $employee->payment_method_id = request('payment-method');
        $employee->save();

        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::where('id', $id);
        $employee->delete();

        return redirect('/employee');
    }
}
