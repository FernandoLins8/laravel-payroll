<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Sell;
use Illuminate\Http\Request;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('sell.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = request('employee-id');
        $employee = Employee::where('id', $id)->first();

        // 2 = commissioned type of employee
        if(!$employee || $employee->employee_type_id !== 2) {
            return view('layouts.not_found');
        }

        return view('sell.create', ['employee' => $employee]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sell::create([
            'employee_id' => request('employee-id'),
            'description' => request('description'),
            'value' => request('value'),
            'date' => date("Y-m-d")
        ]);

        return redirect('/sell');
    }
}
