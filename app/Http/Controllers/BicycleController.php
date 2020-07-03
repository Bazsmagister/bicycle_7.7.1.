<?php
namespace App\Http\Controllers;

use App\Bicycle;
//use App\Traits\UploadTrait;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class BicycleController extends Controller
{
    //I want to only serviceworkers to get this page
    public function __construct()
    {
        // if you want an auth middleware in this controller just turn it on:
        // $this->middleware('auth');
        // $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function autocompleteBike(Request $request)
    {
        $data = Bicycle::select("name")

                ->where("name", "LIKE", "%{$request->input('query')}%")

                ->select('name')->distinct()//?

                ->get();

        return response()->json($data);
    }

    public function index()
    {
        // $result=Bicycle::whereRaw('DATEDIFF(created_at,updated_at)<7')
        // //  ->select('*')
        // ->get();

        // dd($result);

        // $sellable_bicycles = Bicycle::all();
        // // return view('bicyclestosell', compact('sellable_bicycles'))->guest(); //doesn't work
        // return view('bicyclestosell', compact('sellable_bicycles'));

        //$bicycles = Bicycle::all();
        // $bicycles = DB::table('bicycles')->orderBy('created_at', 'desc')->paginate(8);
        // $bicycles = DB::table('bicycles')->orderBy('updated_at', 'desc')->paginate(200);
        $bicycles = DB::table('bicycles')->paginate(15);


        return view('bicycles.index', compact('bicycles'));
    }

    public function sellable()
    {
        $sellable_bicycles = DB::table('bicycles')->where('is_sellable', 1)->get();
        //dump($sellable_bicycles);
        //die();
        return view('bicyclestosell', compact('sellable_bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bicycles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if ($request->hasFile('image')) {
        //     $path = Storage::disk('local')->put($request->file('image')->getClientOriginalName(), $request->file('image')->get());

        //     //dd($path);

        //     $imageName = 'hello'.time().'.'.request()->image->getClientOriginalExtension();

        //     $path = $request->file('image')->storeAs('images', $imageName);
        //     dd($path);
        //     //$bicycle->image_url = $path;
        // }

        //Bicycle::create($request->all());

        // $data= $request->all();
        // echo "<pre>";
        // print_r($data);
        // die;

        $request->validate([
            'name'         =>  'string',
            'description'  => 'string',
            'price' => 'numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2040',
        ]);

        $bicycle=  Bicycle::create([
        'name' => request('name'),
        'description' => request('description'),
        'price' => request('price'),
        // 'image' => request('image'),
        'image' => $request->file('image'),
        'is_sellable' => request('is_sellable'),
        'is_rentable' => request('is_rentable'),
        'is_serviceable' => request('is_serviceable'),

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
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('bicycles.show', ['bicycle' => Bicycle::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bicycle $bicycle)
    {
        return view('bicycles.edit', compact('bicycle'));
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
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
        $bicycle->name = $request->input('name');
        $bicycle->description = $request->input('description');
        $bicycle->price = $request->input('price');
        $bicycle->is_sellable = $request->input('is_sellable');
        $bicycle->is_rentable = $request->input('is_rentable');
        $bicycle->is_serviceable = $request->input('is_serviceable');
        $bicycle->image = $request->file('image');

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
            $bicycle->image = $filePath;
        }
        // Persist user record to database
        $bicycle->save();
        //dd($bicycle);


        // Return user back and show a flash message
        return redirect('bicycles')->with(['message' => 'Bicycle updated successfully.']);
    }

    // if ($request->isMethod('post')) {
    //     $data= $request->all();
    //     //echo "<pre>";print_r($data);die;

    //     //Creating Validation
    //     //   $rules =[
    //     //                 'admin_name'=>'required|string',
    //     //                 'mobile'=> 'required|numeric',
    //     //                 'admin_image'=> 'required|image|file',

    //     //             ];

    //     //   $customMessage=[
    //     //                 'admin_name.required'=>'Name is Required',
    //     //                 'admin_name.alpha' => 'Valid Name is required',
    //     //                 'mobile.required'=>'Mobile is Required',
    //     //                 'mobile.numeric'=>'Valid Mobile is Required',
    //     //                'admin_image.required'=>'Image is Required',
    //     //                'admin_image.image'=>'Valid Image is Required',
    //     //             ];

    //     //   $this->validate($request, $rules, $customMessage);

    //     //Uploading Admin Image
    //     // $imageName= '';
    //     if ($request->hasFile('image')) {
    //         $image_tmp = $request->hasFile('image');
    //         if ($image_tmp->isValid()) {

    //                 //get extension
    //             $extension = $image_tmp->getClientOriginalExtension();

    //             //Generating image name
    //             $imageName= rand(111, 999999).'.'.$extension;

    //             //Image Path
    //             $imagePath= 'images/admin_images/admin_photos/'.$imageName;

    //             //Uploading the image
    //             Bicycle::make($image_tmp)->save($imagePath);
    //         }
    //     } else {
    //         $imageName="";
    //         //return false;
    //     }



    //     //$result=Bicycle  //::where('email', Auth::guard('admin')->user()->email)
    //     Bicycle::update(['name'=>$data['name'], 'description'=>$data['description'], 'image'=>$imageName]);

    //     //echo "<pre>";print_r($result);die;
    //     //Session::flash('success_message', 'Details updated Successfully');
    //     return redirect()->back();
    // }

    // return view('home');


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bicycle $bicycle)
    {
        //$bicycle = Bicycle::findOrFail($bicycle);
        $bicycle->delete();
        return redirect()->route('bicycles.index')
            ->with(
                'message',
                'Bike successfully deleted'
            )->with('alert-class', 'alert-danger');
    }

    public function allRentableBicycles()
    {
        /* $rentable_bicycles = DB::select('select * from bicycles where is_rentable = ?', [1]); */
        // $rentable_bicycles = DB::select('select * from bicycles where is_availableToRent = ?', [1]);
        // return view('bicyclestorent', compact('rentable_bicycles'));

        // $rentable_bicycles = DB::select('select * from bicycles where is_rentable = ?', [1]);
        $rentable_bicycles = DB::table('bicycles')->where('is_rentable', 1)->where('is_availabletoRent', 1)->get();

        return view('bicyclestorent', compact('rentable_bicycles'));
    }


    public function rentThisBicycle($id)
    {
        return view('bicycles.show', ['bicycle' => Bicycle::findOrFail($id)]);


        // $rentable_bicycles = DB::select('select * from bicycles where is_rentable = ?', [1]);
        // return view('bicyclestorent', compact('rentable_bicycles'));
    }

    public function rent($id)
    {
        //$rentable_bicycles = DB::select('select * from bicycles where is_rentable = ?', [1]);

        return view('rent_this_bicycle', ['bicycle' => Bicycle::findOrFail($id)]);
        // return view('bicycle_rent_form', ['bicycle' => Bicycle::findOrFail($id)]);
    }

    public function buy(Bicycle $bicycle)
    {
        $sellable_bicycles = DB::select('select * from bicycles where is_sellable = ?', [1]);
        return view('bicyclestosell', compact('sellable_bicycles'));
    }

    public function service()
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
                                    ->where('isActive', '1')
                                    ->get();

        //print_r($myBicycleServiceProgress);
        //dd($myBicycleServiceProgress);

        // return view('bicycleservice', compact('bicycles_in_service'));
        return view('bicycleservice', compact('myBicycleServiceProgress'));
    }
}
