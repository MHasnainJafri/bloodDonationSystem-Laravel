<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\user;

class usersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = user::paginate(10);
        return view('users.index', compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.add");
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
        $user =  user::create($request->only('BloodType','recipient_id','donor_id','location'));
        
        return redirect(route('users.index'))->with('message', 'user created with success');
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
        $user = user::find($id);
        return view("users.edit", compact('user'));
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
            "name" => "required",
            "email" => "required",
            "Address" => "required",
            "Country" => "required",
            "provice" => "required",
            "District" => "required",
         ]);
         $user = user::find($id);
        $user->update($request->only('name','email'));
        $user->userinfo()->update($request->only('BloodType','Address','Country','provice','District'));
        return redirect(route('users.index'))->with('message', 'user updated with success');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        user::find($id)->delete();
        return redirect(route('user.index'))->with('message', 'user deleted with success');
    }
}
