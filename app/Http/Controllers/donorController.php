<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\bloodRequests;
use App\Models\user;

class donorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
         $donors= user::all();
        
        return view('donorrequest.recipients', compact('donors'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("donorrequest.add");
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           "BloodType" => "required",
           "recipient_id" => "required",
           "donor_id" => "required",
           "location" => "required"
        ]);
        $bloodRequests =  bloodRequests::create($request->only('BloodType','recipient_id','donor_id','location'));
        
        return redirect(route('donorrequest.index'))->with('message', 'bloodRequests created with success');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bloodRequest = bloodRequests::find($id);
        return view("donorrequest.edit", compact('bloodRequest'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            "BloodType" => "required",
            "recipient_id" => "required",
            "donor_id" => "required",
            "location" => "required"
         ]);
        $bloodRequests = bloodRequests::find($id)->update($request->only('BloodType','recipient_id','donor_id','location'));
        return redirect(route('donorrequest.index'))->with('message', 'bloodRequests updated with success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        bloodRequests::find($id)->delete();
        return redirect(route('donorrequest.index'))->with('message', 'bloodRequests deleted with success');
    }
}
