<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\bloodRequests;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class bloodrequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(\Auth::user()->type==1){
            $bloodRequests = bloodRequests::paginate(10);
        return view('bloodrequest.bloodrequest', compact('bloodRequests'));
        }
        $bloodRequests = bloodRequests::where('donor_id',\Auth::user()->id)->paginate(10);
        return view('bloodrequest.bloodrequest', compact('bloodRequests'));
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bloodRequest.add");
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
        
        return redirect(route('bloodrequest.index'))->with('message', 'bloodRequests created with success');
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
        return view("bloodRequest.edit", compact('bloodRequest'));
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
        return redirect(route('bloodrequest.index'))->with('message', 'bloodRequests updated with success');
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
        return redirect()->back()->with('message', 'bloodRequests deleted with success');
    }


    public function bloodrequest(){}
    public function sendRequest($id=1,$bloodtype){
        \App\Models\bloodRequests::create([
            'recipient_id'=>auth()->user()->id,
            'BloodType'=> $bloodtype,
            'donor_id'=>$id,
            'location'=>User::find($id)->userinfo->Address

        ]);
        return Redirect()->route('bloodrequest.request')->with('success','Request Sent Successfully');
    }
    public function search(Request $request){

        $address = $request->Address;
        $bloodtype = $request->BloodType;
        $bloodRequest=  User::whereHas('userinfo', function ($query) use ($address, $bloodtype) {
            $query->where('address','like', '%'.$address.'%')
            ->whereHas('blood', function ($query) use ($bloodtype) {
                $query->where('id', $bloodtype);
            });
        })->get();
        return view('bloodrequest.request',compact('bloodRequest'));

    }
    public function bloodrequestview(){
        return view('bloodrequest.request');
    }
}
