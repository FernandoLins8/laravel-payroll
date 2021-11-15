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
        $employees =  Commissioned::with('employee')->get();
        return view('sell.index', ['employees' => $employees]);
    }

    
    //  List sells by employee.
    public function listByEmployee($id)
    {
        $commissioned = Commissioned::where('employee_id', $id)->first();

        if(!$commissioned) {
            return view('layouts.not_found');
        }

        return view('sell.create', [
            'commissioned' =>$commissioned,
            'employee' => $commissioned->employee
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
        
        Sell::create([
            'employee_id' => $employeeId,
            'description' => request('description'),
            'value' => request('value'),
            'date' => request('date')
        ]);

        return redirect()->route(
            'list-sells-by-employee',
            $employeeId
        );
    }

    public function destroy($id) {
        $sell = Sell::where('id', $id)->first();
        $employeeId = $sell->employee_id;
        
        $sell->delete();

        return redirect()->route(
            'list-sells-by-employee',
            $employeeId
        );
    }
}
