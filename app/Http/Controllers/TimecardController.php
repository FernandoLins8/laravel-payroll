<?php

namespace App\Http\Controllers;

use App\Models\Hourly;
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
        $hourlyEmployees = Hourly::all();
        return view('timecard.index', ['hourlyEmployees' => $hourlyEmployees]);
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
        $hourly = Hourly::where('employee_id', $id)->first();

        if(!$hourly) {
            return view('layouts.not_found');
        }
        
        return view('timecard.create', [
            'employee' => $hourly->employee
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
        $date = request('date'); 

        Timecard::create([
            'date' => $date,
            'working_hours' => $workingHours,
            'employee_id' => $employeeId
        ]);

        return redirect('/timecard');
    }
}
