<?php

namespace App\Http\Controllers;

use Exception;
use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function getIndex()
    {
        return view('admin.contacts');
    }

    public function getData()
    {
        return Contact::all();
    }



    public function postStore(Request $request)
    {
        return Contact::create($request->all());
    }


    public function postUpdate(Request $request)
    {
        // if ($request->has('id')) {
        //     $record = Contact::find($request->input('id'));

        //     $record->update($request->all());
        // }

        try {
            $requestData = $request->all();
            $record     = Contact::find($request->input('id'));
            if ($record == null) {
                $return = ['data' => ['msg' => 'Could not find record']];
                return response()->json($return, 404);
            }
            $record->update($requestData);
            $return = ['data' => ['msg' => 'Record updated successfully!']];
            return response()->json($return, 201);
        } catch (Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
            }
            return response()->json(ApiError::errorMessage('There was an error performing the update operation', 1011), 500);
        }
    }


    public function postDelete(Request $request)
    {
        if ($request->has('id')) {
            $record = Contact::where('id', $request->input('id'));

            $record->delete();
        }
    }
}
