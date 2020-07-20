<?php

namespace App\Http\Controllers;

use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $services = Service::orderBy('created_at', 'desc')->get();
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
        $requestdata= $request->all();
        //dd($requestdata);

        // Doc:
        // $validatedData = $request->validate([
        // 'title' => 'required|unique:posts|max:255',
        // 'body' => 'required',
        // ]);


        //Validating fields
        $this->validate($request, [
            'user_id'=>'required',
            'bicycle_id' =>'required|numeric',
            'serviceman_id' => 'numeric',

            'failure_description' =>'string',

            // 'broughtIn_at' =>'',
            // 'startedToServiceIt_at' => '',
            // 'readyToTakeIt_at' => '',
            // 'taken_at' => '',

             'accpeted' =>'',
            'repairing' => '',
            'ready' => '',
            'taken' => '',

            'notes' => 'sometimes|string',

            'isActive' => 'numeric',
            'status' => 'string',
            ]);



        $serviceData = [
                //'user_name' => $request->user_name,
                'user_id' => $request->user_id,
                'bicycle_id' => $request ->bicycle_id,
                'serviceman_id' => $request ->serviceman_id,
                'failure_description' => $request ->failure_description,
               /*  'rentStarted_at' => Carbon::now(),
                'rentEnds_at' => (Carbon::now()->addDay(1)), */
                // 'broughtIn_at' => $request->broughtIn_at ?? Carbon::now(),
                // // 'startedToService_at' =>  $request->startedToService_at ?? Carbon::now(),
                // 'startedToService_at' =>  $request->startedToService_at ?? null,
                // // 'readyToTakeIt_at' => $request->readyToTakeIt_at ?? Carbon::now()->addDay(2),
                // 'readyToTakeIt_at' => $request->readyToTakeIt_at ?? null,
                // 'taken_at' => $request->taken_at ?? null,

                'accepted' => $request->accepted ?? Carbon::now(),
                // 'startedToService_at' =>  $request->startedToService_at ?? Carbon::now(),
                'repairing' =>  $request->repairing ?? null,
                // 'readyToTakeIt_at' => $request->readyToTakeIt_at ?? Carbon::now()->addDay(2),
                'ready' => $request->ready ?? null,
                'taken' => $request->taken ?? null,


                'notes' => $request->notes ?? 'No notes yet, everything has worked fine',

                //'isActive' => $request->isActive,
                //'status' => $request ->status,

                //'isActive' => '1',


            ];
        $service = Service::firstOrCreate($serviceData);

        //$service->status = 'accepted';
        //$service->isActive = '1';

        $service->save();
        //dd('Hello');

        //$user= auth()->user();

        // $user= auth()->user()->name;
        //dd($user);

        //$rent = $user->rents()->get();

        //dd($rent);
        // $when = now()->addMinutes(1);
        // $user->notify((new RentisOver($rent))->delay($when));

        // $user->notify(new rentIsOver($rent));

        /*
        $user= $service->user();
        //dd($user);
        $user->notify(new newServiceCreated($service));
        */

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

        $service->failure_description = $request->input('failure_description');

        // $service->broughtIn_at = $request->input('broughtIn_at');
        // $service->startedToService_at = $request->input('startedToService_at');
        // $service->readyToTakeIt_at = $request->input('readyToTakeIt_at');
        // $service->taken_at = $request->input('taken_at');

        $service->accepted = $request->input('accepted');
        $service->repairing = $request->input('repairing');
        $service->ready = $request->input('ready');
        $service->taken = $request->input('taken');


        //$service->isActive = $request->input('isActive');
        $service->notes = $request->input('notes');

        //$service->status = $request->input('status');


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

    public function myserviceprogress()
    {
        // $bicycles_in_service = DB::select('select * from bicycles where is_serviceable = ?', [1]);
        // return view('bicycleservice', compact('bicycles_in_service'));

        $user_id = auth()->user()->id;
        //echo($user_id);

        // $myBicycleServiceProgress = DB::select('select * from services where user_id = ?', [$user_id]);
        // print_r($myBicycleServiceProgress);

        // $myBicycleServiceProgress = DB::whereRaw('select * from services, user_id = $user_id');
        // print_r($myBicycleServiceProgress);

        // $myBicycleServiceProgress = DB::table('users')->leftJoin('services', 'users.id', '=', 'services.user_id')->get();
        // print_r($myBicycleServiceProgress);
        // dd($myBicycleServiceProgress);

        $myBicycleServiceProgress = DB::table('services')
                                    ->where('user_id', [$user_id])
                                    ->where('taken', null)
                                    ->get();

        //print_r($myBicycleServiceProgress);
        //dd($myBicycleServiceProgress);

        // return view('bicycleservice', compact('bicycles_in_service'));
        return view('services.myserviceprogress', compact('myBicycleServiceProgress'));
    }

    public function myoldservices()
    {
        // $bicycles_in_service = DB::select('select * from bicycles where is_serviceable = ?', [1]);
        // return view('bicycleservice', compact('bicycles_in_service'));

        $user_id = auth()->user()->id;
        //echo($user_id);

        // $myBicycleServiceProgress = DB::select('select * from services where user_id = ?', [$user_id]);
        // print_r($myBicycleServiceProgress);

        // $myBicycleServiceProgress = DB::whereRaw('select * from services, user_id = $user_id');
        // print_r($myBicycleServiceProgress);

        // $myBicycleServiceProgress = DB::table('users')->leftJoin('services', 'users.id', '=', 'services.user_id')->get();
        // print_r($myBicycleServiceProgress);
        // dd($myBicycleServiceProgress);

        // $myoldservices = DB::table('services')
        //                             ->where('user_id', [$user_id])
        //                             ->whereNot('taken', '!=', null)
        //                             ->get();
        $myoldservices = Service::where('user_id', [$user_id])
                                    ->where('taken', '<>', null)
                                    ->get();


        //print_r($myBicycleServiceProgress);
        //dd($myBicycleServiceProgress);

        // return view('bicycleservice', compact('bicycles_in_service'));
        return view('services.myoldservices', compact('myoldservices'));
    }

    public function myworkshop()
    {
        $id = auth()->user()->id;
        //dd($id);

        $mybicyclesneedtorepair = Service::with('user')->
       // select('*')->
        where('serviceman_id', $id)
        ->get();

        $needtorepaircount = $mybicyclesneedtorepair->count();
        //dd($needtorepaircount);
        //dd($mybicyclesneedtorepair);

        return view('services.myworkshop', compact('mybicyclesneedtorepair', 'needtorepaircount'));
    }
}
