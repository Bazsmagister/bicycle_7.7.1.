<?php

namespace App\Http\Controllers;

use App\Bicycle;
use App\Traits\UploadTrait;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BicycleController extends Controller
{
    //I want to only serviceworkers to get this page
    public function __construct()
    {
        // if you want an auth middleware in this controller just turn it on:
        // $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellable_bicycles = Bicycle::all();
        // return view('bicyclestosell', compact('sellable_bicycles'))->guest(); //doesn't work
        return view('bicyclestosell', compact('sellable_bicycles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bicycles_to_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Bicycle::create($request->all());

        // $data= $request->all();
        // echo "<pre>";
        // print_r($data);
        // die;

        $bicycle=  Bicycle::create([
        'name' => request('name'),
        'description' => request('description'),
        'image' =>  function ($request) {
            if ($request->hasFile('image')) {
                $image_tmp = $request->file('image');
                if ($image_tmp->isValid()) {

                        //get extension
                    $extension = $image_tmp->getClientOriginalExtension();

                    //Generating image name
                    $imageName= rand(111, 999999).'.'.$extension;

                    //Image Path
                    $imagePath= 'images/'.$imageName;


                    //Uploading the image
                    return request('$image_tmp');
                    //Bicycle::make($image_tmp)->save($imagePath);
                }
            } else {
                $imageName="";
                return false;
            }
        }]);




        // $request->flash();
        // $request->flashOnly(['username', 'email']);
        // $request->flashExcept('password');

        Session::flash('message', 'Bicycle has written in DB');

        return redirect('bicycle')->with('status', 'A new bic is uploaded to DB');

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
        return view('bicycle_show', ['bicycle' => Bicycle::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bicycle  $bicycle
     * @return \Illuminate\Http\Response
     */
    public function edit(Bicycle $bicycle)
    {
        return view('bicycle_edit', compact('bicycle'));
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
        // Form validation
        $request->validate([
            'name'              =>  'string',
            'image'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Get current bike
        //$bicycle = Bicycle::findOrFail($id);
        // Set bike name
        $bicycle->name = $request->input('name');
        $bicycle->description = $request->input('description');
        $bicycle->price = $request->input('price');



        // Check if a profile image has been uploaded
        if ($request->has('image')) {
            // Get image file
            $image = $request->file('image');
            // Make a image name based on user name and current timestamp
            $name = Str::slug($request->input('name')).'_'.time();
            // Define folder path
            $folder = '/uploads/images/';
            // Make a file path where image will be stored [ folder path + file name + file extension]
            $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
            // Upload image
            $this->uploadOne($image, $folder, 'public', $name);
            // Set user profile image path in database to filePath
            $bicycle->image = $filePath;
        }
        // Persist user record to database
        $bicycle->save();

        // Return user back and show a flash message
        return redirect()->back()->with(['status' => 'Profile updated successfully.']);
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
        return redirect()->route('bicycle.index')
            ->with(
                'message',
                'Bike successfully deleted'
            )->with('alert-class', 'alert-danger');
    }

    public function rent(Bicycle $bicycle)
    {
        $rentable_bicycles = DB::select('select * from bicycles where is_rentable = ?', [1]);
        return view('bicyclestorent', compact('rentable_bicycles'));
    }

    public function buy(Bicycle $bicycle)
    {
        $sellable_bicycles = DB::select('select * from bicycles where is_sellable = ?', [1]);
        return view('bicyclestosell', compact('sellable_bicycles'));
    }
    public function service()
    {
        $bicycles_to_service= DB::select('select * from bicycles where is_serviceable = ?', [1]);
        return view('bicycle_to_service', compact('bicycles_to_service'));
    }
}
