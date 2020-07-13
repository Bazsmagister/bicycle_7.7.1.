<?php

namespace App\Http\Controllers;

use App\BicycleToRent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BicycleToRentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bicycles = DB::table('bicycle_to_rents')->paginate(15);


        return view('bicyclesToRent.index', compact('bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bicyclesToRent.create');
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
            'rent_price' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2040',
        ]);

        $bicycle=  BicycleToRent::create([
        'name' => request('name'),
        'description' => request('description'),
        'rent_price' => request('price'),
        // 'image' => request('image'),
        'image' => $request->file('image'),


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

        return redirect('bicycle')->with('message', 'A new bic is uploaded to DB');

        // $input = $request->all();
        // $name = $request->input('name');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BicycleToRent  $bicycleToRent
     * @return \Illuminate\Http\Response
     */
    // public function show(BicycleToRent $bicycleToRent)
    // {
    //     return view('bicyclesToRent.show', compact('bicycleToRent'));

    //     //return view('bicycles.show', ['bicycle' => Bicycle::findOrFail($id)]);
    // }

    public function show($id)
    {
        // it works this way:
        //return view('users.show', ['user' => User::findOrFail($id)]);
        return view('bicyclesToRent.show', ['bicycleToRent' => BicycleToRent::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BicycleToRent  $bicycleToRent
     * @return \Illuminate\Http\Response
     */
    public function edit(BicycleToRent $bicycleToRent)
    {
        return view('bicyclesToRent.edit', compact('bicycleToRent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BicycleToRent  $bicycleToRent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BicycleToRent $bicycleToRent)
    {
        $data= $request->all();
        // echo "<pre>";
        // print_r($data);
        //die;

        // Form validation
        $request->validate([
            'name'              =>  'string',
            'description'  => 'string',
            'price' => 'numeric',
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current bike
        //$bicycle = Bicycle::findOrFail($bicycle);
        // Set bike name
        $bicycleToRent->name = $request->input('name');
        $bicycleToRent->description = $request->input('description');
        $bicycleToRent->price = $request->input('price');

        $bicycleToRent->image = $request->file('image');

        //dd($bicycle);


        // Check if a profile image has been uploaded
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = 'images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $bicycleToRent->image = $filePath;
        }
        // Persist user record to database
        $bicycleToRent->save();
        //dd($bicycle);


        // Return user back and show a flash message
        return redirect('bicycles')->with(['message' => 'Bicycle updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BicycleToRent  $bicycleToRent
     * @return \Illuminate\Http\Response
     */
    public function destroy(BicycleToRent $bicycleToRent)
    {
        //$bicycle = Bicycle::findOrFail($bicycle);
        $bicycleToRent->delete();
        return redirect()->route('bicycles.index')
            ->with(
                'message',
                'Bike successfully deleted'
            )->with('alert-class', 'alert-danger');
    }

    public function autocompleteBikeToRent(Request $request)
    {
        $data = BicycleToRent::select("name")

                ->where("name", "LIKE", "%{$request->input('query')}%")

                ->select('name')->distinct()//?

                ->get();

        return response()->json($data);
    }

    public function findId(Request $request)
    {
        $foundbikename= request('name');
        $bike =  DB::table('bicycle_to_rents')->where('name', $foundbikename)->first();
        //dd($user);
        $myid = $bike->id;

        //dd($myid);

        return view('rents.create', compact('myid', 'foundbikename'));
    }

    public function rent($id)
    {
        //$rentable_bicycles = DB::select('select * from bicycles where is_rentable = ?', [1]);

        return view('rent_this_bicycle', ['bicycle' => BicycleToRent::findOrFail($id)]);
        // return view('bicycle_rent_form', ['bicycle' => Bicycle::findOrFail($id)]);
    }
}
