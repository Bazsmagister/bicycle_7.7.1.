<?php

namespace App\Http\Controllers;

use App\Service;
use App\BicycleToService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BicycleToServiceController extends Controller
{
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
        $bicycles = BicycleToService::all();

        //$bicycles = DB::table('bicyclesToService')->paginate(15);

        return view('bicyclesToService.index', compact('bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bicyclesToService.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'         =>  'string',
            'description'  => 'string',
            'price' => 'numeric',

        ]);

        $bicycle=  BicycleToService::create([
        'name' => request('name'),
        'description' => request('description'),
        'price' => request('price'),

        ]);

        // dd($bicycle);

        // $request->session()->put('key', 'myvalue');
        // $answer= $request->session()->get('key', 'default');
        // dump($answer);

        $imageName = 'hello'.time().'.'.request()->image->getClientOriginalExtension();
        //dd($imageName);
        //die;
        //$path = request()->image->move(public_path('images'), $imageName);
        //$path =request()->image->move(storage_path('images'), $imageName);

        // $path =  $request->file('image')->storeAs('/public/storage/images', $imageName);
        $path =  $request->file('image')->storeAs('images', $imageName);

        //$bicycle->image = $request->file('image');


        //dd($path);
        //$bicycle['image']= $path;
        $bicycle->image = $path;

        $bicycle->save();
        //dd($bicycle);

        //$img = request()->image;
        //$img = request('image');
        //dd($img);

        // $request->flash();
        // $request->flashOnly(['username', 'email']);
        // $request->flashExcept('password');

        Session::flash('message', 'Bicycle has written in DB');

        return redirect('bicyclesToService')->with('message', 'A new bicycle to service is uploaded to DB');

        // $input = $request->all();
        // $name = $request->input('name');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BicycleToService  $bicycleToService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bicycleToService = BicycleToService::findOrFail($id);
        return view('bicyclesToService.show', compact('bicycleToService'));

        //return view('bicyclesToSell.show', ['bicycleToSell' => BicycleToSell::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BicycleToService  $bicycleToService
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bicyclesToService.edit', ['bicycleToService' => BicycleToService::findOrFail($id)]);

        //$bicycleToService => BicycleToService::findOrFail($id);
        //return view('bicyclesToService.edit', compact('bicycleToService'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BicycleToService  $bicycleToService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data= $request->all();
        // echo "<pre>";
        // print_r($data);
        //die;

        // Form validation
        $request->validate([
            'name'              =>  'string',
            'description'  => 'string',
            // 'workhours' => 'numeric',

        ]);

        // Get current bike
        $bicycleToService = BicycleToService::findOrFail($id);
        // Set bike name
        $bicycleToService->name = $request->input('name');
        $bicycleToService->description = $request->input('description');
        //not needed:
        // $bicycleToService->workhours = $request->input('workhours');


        // Persist user record to database
        $bicycleToService->save();
        //dd($bicycle);


        // Return user back and show a flash message
        return redirect('bicyclesToService')->with(['message' => 'Bicycle updated successfully.']);
        //or
        return redirect()->route('bicyclesToService.show', $bicycleToService->id)->with(
            'message',
            'Bicycle, '. $bicycleToService->name.' updated'
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BicycleToService  $bicycleToService
     * @return \Illuminate\Http\Response
     */
    public function destroy($bicycle)
    {
        //$bicycle = Bicycle::findOrFail($bicycle);
        $bicycle = BicycleToService::findOrFail($bicycle);

        $bicycle->delete();
        return redirect()->route('bicyclesToService.index')
            ->with(
                'message',
                'Bike successfully deleted'
            )->with('alert-class', 'alert-danger');
    }

    public function autocompleteBikeToService(Request $request)
    {
        $data = BicycleToService::select("name")

                ->where("name", "LIKE", "%{$request->input('query')}%")

                // ->where('is_availableToRent', 1)

                ->select('name')->distinct()//?

                ->get();

        return response()->json($data);
    }

    public function showmetheservicebike()
    {
        $foundbikenameautocomp= request('name');
        $bikeautocomp =  DB::table('bicycle_to_services')->where('name', $foundbikenameautocomp)->first();
        //$myidautocomp = $bikeautocomp->id;
        $id = $bikeautocomp->id;

        return view('bicyclesToService.show', ['bicycleToService' => BicycleToService::findOrFail($id)]);
    }
}
