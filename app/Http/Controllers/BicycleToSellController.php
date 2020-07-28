<?php

namespace App\Http\Controllers;

use App\BicycleToSell;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use Symfony\Component\HttpFoundation\File\UploadedFile;

//use \app\Traits\UploadTrait;


class BicycleToSellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bicyclesCount = BicycleToSell::count();
        $bicycles = DB::table('bicycle_to_sells')->paginate(15);


        return view('bicyclesToSell.index', compact('bicycles', 'bicyclesCount'));
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(6);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bicyclesToSell.create');
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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2040',
        ]);

        $bicycle=  BicycleToSell::create([
        'name' => request('name'),
        'description' => request('description'),
        'price' => request('price'),
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

        return redirect('bicyclesToSell')->with('message', 'A new bicycle to sell is uploaded to DB');

        // $input = $request->all();
        // $name = $request->input('name');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BicycleToSell  $bicycleToSell
     * @return \Illuminate\Http\Response
     */

    // public function show(BicycleToSell $bicycleToSell)
    // {
    //     it doesn't work with RouteModelBinding.  I don't know why. I set $table in model even,
    //     //dd($bicycleToSell);
    //     return view('bicyclesToSell.show', compact('bicycleToSell'));
    // }

    public function show($id)
    {
        // it works this way:
        //return view('users.show', ['user' => User::findOrFail($id)]);
        return view('bicyclesToSell.show', ['bicycleToSell' => BicycleToSell::findOrFail($id)]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BicycleToSell  $bicycleToSell
     * @return \Illuminate\Http\Response
     */
    // public function edit(BicycleToSell $bicycleToSell)
    // {
    //     dd($bicycleToSell);
    //     return view('bicyclesToSell.edit', compact('bicycleToSell'));
    // }

    public function edit($id)
    {
        return view('bicyclesToSell.edit', ['bicycleToSell' => BicycleToSell::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BicycleToSell  $bicycleToSell
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
            'price' => 'numeric',
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current bike
        //$bicycle = Bicycle::findOrFail($bicycle);

        // Set bike name
        $bicycleToSell = BicycleToSell::findOrFail($id);

        $bicycleToSell->name = $request->input('name');
        $bicycleToSell->description = $request->input('description');
        $bicycleToSell->price = $request->input('price');

        $bicycleToSell->image = $request->file('image');

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
            $bicycleToSell->image = $filePath;
        }
        // Persist user record to database
        $bicycleToSell->save();
        //dd($bicycle);


        // Return user back and show a flash message
        return redirect()->route('bicyclesToSell.show', $bicycleToSell->id)->with(
            'message',
            'Bicycle, '. $bicycleToSell->name.' updated'
        );

        return redirect('bicyclesToSell')->with(['message' => 'Bicycle updated successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BicycleToSell  $bicycleToSell
     * @return \Illuminate\Http\Response
     */

    //  This didn't work
    // public function destroy(BicycleToSell $bicycleToSell)
    // {
    //     //$bicycle = Bicycle::findOrFail($bicycle);
    //     $bicycleToSell->delete();
    //     return redirect()->route('bicyclesToSell.index')
    //         ->with(
    //             'message',
    //             'Bike successfully deleted'
    //         )->with('alert-class', 'alert-danger');
    // }

    public function destroy($bicycle)
    {
        $bicycle = BicycleToSell::findOrFail($bicycle);
        $bicycle->delete();
        return redirect()->route('bicyclesToSell.index')
            ->with(
                'message',
                'Bike successfully deleted'
            )->with('alert-class', 'alert-danger');
    }

    public function autocompleteBikeToSell(Request $request)
    {
        $data = BicycleToSell::select("name")

                ->where("name", "LIKE", "%{$request->input('query')}%")

                ->select('name')->distinct()//?

                ->get();

        return response()->json($data);
    }

    public function showmethesellablebike()
    {
        $foundbikenameautocomp= request('name');
        $bikeautocomp =  DB::table('bicycle_to_sells')->where('name', $foundbikenameautocomp)->first();
        //$myidautocomp = $bikeautocomp->id;
        $id = $bikeautocomp->id;


        return view('bicyclesToSell.show', ['bicycleToSell' => BicycleToSell::findOrFail($id)]);
    }
}
