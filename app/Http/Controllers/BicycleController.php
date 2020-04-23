<?php

namespace App\Http\Controllers;

use App\Bicycle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BicycleController extends Controller
{
    //I want to only serviceworkers to get this page
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bicycles = Bicycle::all();
        return view('bicyclestoservice', compact('bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function show(Bicycle $bicycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bicycle $bicycle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bicycle $bicycle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bicycle $bicycle)
    {
        //
    }

    public function rent(Bicycle $bicycle)
    {
        $rentablebicycles = DB::select('select * from bicycles where is_rentable = ?', [1]);
        return view('bicyclestorent', compact('rentablebicycles'));
    }

    public function buy(Bicycle $bicycle)
    {
         $sellablebicycles = DB::select('select * from bicycles where is_sellable = ?', [1]);
        return view('bicyclestosell', compact('sellablebicycles'));
    }

}
