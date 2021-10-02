<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hourly;
use App\Models\Employee;
use App\Models\Salaried;
use Illuminate\Support\Str;
use App\Models\Commissioned;
use App\Models\EmployeeType;
use App\Models\PaymentMethod;
use App\Models\UnionRegistration;


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
    public function store(Request $request)
    {
        $employeeTypeId = request('employee-type-id');
        $salaried = new Salaried();
        $commissioned = new Commissioned();
        $hourly = new Hourly();

        if($employeeTypeId === '1')
        {
            $schedule = 1;
            $salaried->salary = request('salary');
        } else if($employeeTypeId === '2')
        {
            $schedule = 2;
            $commissioned->base_salary = request('base-salary');
            $commissioned->commission_tax = request('commission-tax');
        } else if($employeeTypeId === '3') {
            $schedule = 3;
            $hourly->hourly_salary = request('hourly-salary');
        }

        $unionFiliated = request('union');
        if($unionFiliated === "true") {
            $union = UnionRegistration::create([
                'id' => Str::uuid(),
                'union_tax' => request('union-tax')
            ]);
            $unionId = $union->id;

        } else {
            $unionId = null;
        }
        
        $employee = Employee::create([
            'name' => request('name'),
            'address' => request('address'),
            'payment_method_id' => request('payment-method-id'),
            'employee_type_id' => $employeeTypeId,
            'schedule_id' => $schedule,
            'union' => $unionId
        ]);

        if($employeeTypeId === '1')
        {
            $salaried->employee_id = $employee->id;
            $salaried->save();
        } else if($employeeTypeId === '2')
        {
            $commissioned->employee_id = $employee->id;
            $commissioned->save();
        } else if($employeeTypeId === '3') {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
