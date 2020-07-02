<?php

namespace App\Http\Controllers;

use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Notifications\newServiceCreated;

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
                'user_id' => $request->user_id,
                'bicycle_id' => $request -> bicycle_id,
               /*  'rentStarted_at' => Carbon::now(),
                'rentEnds_at' => (Carbon::now()->addDay(1)), */
                'broughtIn_at' => $request->broughtIn_at ?? Carbon::now(),
                'rentStarted_at' =>  $request->rentStarted_at ?? Carbon::now(),
                'rentEnds_at' => $request->rentEnds_at ?? Carbon::now()->addDay(2),
                'taken_at' => $request->taken_at ?? 'Still not taken yet',
                'notes' => $request->notes ?? 'No notes yet, everything was worked fine',
                'isActive' => $request->isActive,
                'status' => $request -> status,


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
        $user->notify(new newServiceCreated($service));
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
        return view('services.show', compact('service')); //works either well
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
        // $rent = Rent::findOrFail($id);

        // $rent->user_id = auth()->user()->id;
        //or
        $service->user_id = $request->input('user_id');
        $service->bicycle_id = $request->input('bicycle_id');
        $service->serviceman_id = $request->input('serviceman_id');

        $service->broughtIn_at = $request->input('broughtIn_at');
        $service->startedToService_at = $request->input('startedToService_at');
        $service->readyToTakeIt_at = $request->input('readyToTakeIt_at');
        $service->taken_at = $request->input('taken_at');
        $service->isActive = $request->input('isActive');
        $service->notes = $request->input('notes');

        $service->save();

        return redirect()->route(
            'services.index',
            $service->id
        )->with(
            'message',
            'Service instant has been updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();


        return redirect()->route('services.index')
            ->with(
                'message',
                'Service instant successfully deleted'
            )->with('alert-class', 'alert-danger');
    }
}
