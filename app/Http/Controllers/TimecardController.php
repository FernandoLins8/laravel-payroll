<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Timecard;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class TimecardController extends Controller
{
    /**
     * Display initial page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('timecard.index');
    }

    /**
     * Show the form for creating a new resource / redirect
     * in case no employee was found
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = request('employee-id');
        $employee = Employee::where('id', $id)->first();

        // 3 = hourly type of employee
        if(!$employee || $employee->employee_type_id !== 3) {
            return view('layouts.not_found');
        }
        
        return view('timecard.create', [
            'employee' => $employee
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
        $employeeId = request('employee-id');
        $workingHours = request('working-hours');
        $date = Carbon::now()->toDateString(); 

        Timecard::create([
            'date' => $date,
            'working_hours' => $workingHours,
            'employee_id' => $employeeId
        ]);

        return view('timecard.index');
    }
}
