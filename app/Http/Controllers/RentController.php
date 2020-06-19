<?php

namespace App\Http\Controllers;

use App\Rent;
use App\User;
use App\Bicycle;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\rentIsOver;
use App\Notifications\newRentIsMade;
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


        //$rents = Rent::all();
        $rents = Rent::paginate();

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

        /* $rent=  Rent::create([
        'user_id' => request('user_id'),
        'bicycle_id' => request('bicycle_id'),
        'rentStarted_at' => request('rentStarted_at'),
        'rentEnds_at' => request('rentEnds_at')
        ]);
        //$request->flash;

        return redirect()->route('rents.index')

        ->withInput()
             ->with('message', 'Rent Nr.'. $rent->id. '  has been created'); */



        //ver2

        $user = User::find(Auth::id());
        //dd($user);
        if (!$user) {
            return 'no user';
        }

        $bicycle = Bicycle::find($request->input('bicycle_id'));
        $bicycle->is_availableToRent = 0;
        if (!$bicycle) {
            return 'no bike';
        }

        $rentalData = [
                'user_id' => $user->id,
                'bicycle_id' => $bicycle->id,
               /*  'rentStarted_at' => Carbon::now(),
                'rentEnds_at' => (Carbon::now()->addDay(1)), */
                'rentStarted_at' =>  $request->rentStarted_at ?? Carbon::now(),
                'rentEnds_at' => $request->rentEnds_at ?? Carbon::now()->addDay(1),

            ];
        $rent = Rent::firstOrCreate($rentalData);
        $bicycle->is_availableToRent = 0;
        $bicycle->save();


        //$user= auth()->user();

        // $user= auth()->user()->name;
        //dd($user);

        //$rent = $user->rents()->get();

        //dd($rent);
        // $when = now()->addMinutes(1);
        // $user->notify((new RentisOver($rent))->delay($when));

        // $user->notify(new rentIsOver($rent));

        $user->notify(new newRentIsMade($rent));

        // auth()->user()->notify(new newRentMade(Rent::findOrFail($id)));


        return redirect()->route('rents.index')

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
        // return view('rents.show', ['rent' => Rent::findOrFail($id)]);
        return view('rents.show', compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        // $rent = Rent::findOrFail($id);

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
        // $rent = Rent::findOrFail($id);

        // $rent->user_id = auth()->user()->id;
        //or
        $rent->user_id = $request->input('user_id');

        $rent->bicycle_id = $request->input('bicycle_id');
        $rent->rentStarted_at = $request->input('rentStarted_at');
        $rent->rentEnds_at = $request->input('rentEnds_at');
        $rent->save();

        return redirect()->route(
            'rents.index',
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

        // $rent = Rent::findOrFail($id);
        $rent->delete();


        return redirect()->route('rents.index')
            ->with(
                'message',
                'Rent successfully deleted'
            )->with('alert-class', 'alert-danger');
    }
}
