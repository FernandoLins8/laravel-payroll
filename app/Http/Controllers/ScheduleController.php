<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('schedule.index', ['schedules' => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schedule.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $type = request('schedule-type');

        if($type === 'monthly') {
            $day = request('day-of-month');

            if(!$day) {
                return view('layouts.not_found');
            }
            
            Schedule::create([
                'description' => "monthly $day",
                'type' => 'monthly'
            ]);

        } else {
            $weekday = request('weekday');
            $frequency = request('frequency');

            if(!$weekday || !$frequency) {
                return view('layouts.not_found');
            }
            
            Schedule::create([
                'description' => "weekly $frequency $weekday",
                'type' => 'weekly'
            ]);
        }
        
        return redirect('/schedule');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $schedule = Schedule::where('id', $id);
        $schedule->delete();

        return redirect('/schedule');
    }
}
