<?php

namespace App\Http\Controllers;

use App\Models\Commissioned;
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
        $employees =  Commissioned::all();
        return view('sell.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id = request('employee-id');
        $commissioned = Commissioned::where('employee_id', $id)->first();

        if(!$commissioned) {
            return view('layouts.not_found');
        }

        return view('sell.create', ['employee' => $commissioned->employee]);
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
            'date' => request('date')
        ]);

        return redirect('/sell');
    }
}
