<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view(('services.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $serviceData = [
                'user_id' => $user->id,
                'bicycle_id' => $bicycle->id,
               /*  'rentStarted_at' => Carbon::now(),
                'rentEnds_at' => (Carbon::now()->addDay(1)), */
                'rentStarted_at' =>  $request->rentStarted_at ?? Carbon::now(),
                'rentEnds_at' => $request->rentEnds_at ?? Carbon::now()->addDay(2),

            ];
        $service = Service::firstOrCreate($serviceData);

        $service->save();


        //$user= auth()->user();

        // $user= auth()->user()->name;
        //dd($user);

        //$rent = $user->rents()->get();

        //dd($rent);
        // $when = now()->addMinutes(1);
        // $user->notify((new RentisOver($rent))->delay($when));

        // $user->notify(new rentIsOver($rent));

        $user= $service->user();
        dd($user);
        $user->notify(new newServiceIsMade($service));
        //$user->notify(new newRentIsMade($rent));

        // auth()->user()->notify(new newRentMade(Rent::findOrFail($id)));


        return redirect()->route('services.index')

            ->withInput()
                 ->with('message', 'Service Nr.'. $service->id. '  has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
