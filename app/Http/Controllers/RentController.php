<?php

namespace App\Http\Controllers;

use App\Rent;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents = Rent::all();
        return view('rents.index', compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $bicycle = Bicycle::findOrFail($id);
        // ['bicycle' => Bicycle::findOrFail($id)]);
        return view('rents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$user_id = Auth::user()->id();
        // $user_id = auth()->user()->id();
        //dd($user_id);

        $rent=  Rent::create([
        'user_id' => request('user_id'),
        'bicycle_id' => request('bicycle_id'),
        'rentStarted_at' => request('rentStarted_at'),
        'rentEnds_at' => request('rentEnds_at')
    ]);
        //$request->flash;

        return redirect()->//route('users.index')
        back()
        ->withInput()
             ->with('message', 'Rent Nr.'. $rent->id. '  has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        return view('rents.show', ['rent' => Rent::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        $rent = Rent::findOrFail($id);

        return view('rents.edit', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        $rent = Rent::findOrFail($id);
        $rent->user_id = auth()->user()->id;
        $rent->bicycle_id = $request->input('bicycle_id');
        $rent->rentStarted_at = Carbon\Carbon::now();
        $rent->rentEnds_at = $request->input('rentEnds_at');
        $rent->save();

        return redirect()->route(
            'rents.show',
            $rent->id
        )->with(
            'message',
            'Rent updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        $rent = Rent::findOrFail($id);
        $rent->delete();


        return redirect()->route('rents.index')
            ->with(
                'message',
                'Rent successfully deleted'
            )->with('alert-class', 'alert-danger');
    }
}
