<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\bloodRequests;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class otherController extends Controller
{
   
 


    public function sendRequest($id=1,$bloodtype){
        \App\Models\bloodRequests::create([
            'recipient_id'=>auth()->user()->id,
            'BloodType'=> $bloodtype,
            'donor_id'=>$id,
            'location'=>User::find($id)->userinfo->Address,
            'status'=>'Pending'

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

    public function getrequest(){
        $bloodRequests = bloodRequests::where('recipient_id',\Auth::user()->id)->paginate(10);
        return view('bloodrequest.bloodrequest', compact('bloodRequests'));

    }
    public function requestRecieved(){
        $bloodRequests = bloodRequests::where('donor_id',\Auth::user()->id)->paginate(10);
        return view('bloodrequest.bloodrequest', compact('bloodRequests'));

    }
    public function approveblooddonation($id){
        bloodRequests::where('id',$id)->update([
            'status'=>"Active"
        ]);
        return redirect()->back()->with('success','Request Approved successfully');
        $bloodRequests = bloodRequests::where('donor_id',\Auth::user()->id)->paginate(10);
        return view('bloodrequest.bloodrequest', compact('bloodRequests'));

    }
}
