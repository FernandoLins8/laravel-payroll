<?php

namespace App\Http\Controllers;

use App\Models\Hourly;
use App\Models\Employee;
use App\Models\Timecard;

use Illuminate\Http\Request;

class TimecardController extends Controller
{
    /**
     * Display initial page of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hourlyEmployees = Hourly::with('employee')->get();
        return view('timecard.index', ['hourlyEmployees' => $hourlyEmployees]);
    }
    
    /**
     * List Timcards by Employee
     */
    public function listByEmployee($id)
    {
        $hourly = Hourly::where('employee_id', $id)->first();

        if(!$hourly) {
            return view('layouts.not_found');
        }
        
        return view('timecard.create', [
            'hourly' => $hourly,
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

        return redirect()->route(
            'list-by-employee',
            $employeeId
        );
    }

    public function destroy($id) {
        $timecard = Timecard::where('id', $id)->first();
        $employeeId = $timecard->employee_id;

        $timecard->delete();

        return redirect()->route(
            'list-by-employee', 
            $employeeId
        );
    }
}
