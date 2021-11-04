<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\UnionRegistration;
use App\Models\UnionService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::whereNotNull('union_id')->get();
        return view('service.index', ['employees' => $employees]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listByEmployee($id)
    {
        $employee = Employee::where('id', $id)->first();

        if(!$employee->union_id) {
            return view('layouts.not_found');
        }

        return view('service.create', ['employee' => $employee]);
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
        
        UnionService::create([
            'union_id' => request('union-id'),
            'description' => request('description'),
            'tax' => request('tax'),
            'date' => date('Y-m-d')
        ]);

        return redirect()->route(
            'list-services-by-employee',
            $employeeId
        );
    }

    public function destroy($id) {
        $service = UnionService::where('id', $id)->first();
        $union = UnionRegistration::where('id', $service->union_id)->first();

        $service->delete();

        return redirect()->route(
            'list-services-by-employee',
            $union->employee->id
        );
    }
}
