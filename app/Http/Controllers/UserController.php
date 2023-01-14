<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\User;
use App\Helpers\Helper;
use App\Models\Hostel;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $pefix  = 'HST/';
        // $date = date('y/m/');
        // // $random =(Str::random(10)) ;
        // $random = (Str::upper());

        // $pin = $pefix.$date.$random;



        // dd($pin);

        // dd($portal);

            // dd(Auth::user()->fullName);
        $fee = DB::table('fees')->get();
        // dd($fee);
        return view('backend.student.index', compact('fee'));

    }

    public function book(){

        if(Auth::user()->gender === 'male'){

          $hostel = Hostel::get();

            // dd($hostel);

        return view('backend.student.booking', compact('hostel'));
    }

    }



    public function profileImage()
    {
        # code...
        return view('backend.student.profile');

    }

    public function profilePost(Request $request, User $user){

        $validate = Validator::make($request->all(), [
                'profile_photo_path' => 'required|image|png,jpg,gif,svg|max:2048',

            ])->validate();

            // 'profile_photo_path' => 'required|image|png,jpg,gif,svg|max:2048',


            // if($request->hasFile('profile_photo_path')){
            //     $request->profile_photo_path->storeAs('profile', $filename, 'public');
            //     Auth()->user()->update(['profile_photo_path' => $filename]);
            // }

            // $user = DB::table('users')->where('id', $user)->update(['profile_photo_path' => $user]);

            $path = $request->file('profile_photo_path')->store('profile_photo_path');

            dd($path);


            Alert::success('success', 'Hostel updated successfully');

          return redirect()->back();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $validate = Validator::make($request->all(), [
            'fullName' => 'required',
            'gender' => 'required',
            'matricNumber' => 'required|unique:users,matricNumber',
            'department' => 'required',
            'faculty'  =>      'required',
            'level'   => 'required',
            'phoneNumber' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:users,email,',
            'password' => 'required_with:confirm_password|same:confirm_password|min:6',
            'confirm_password' => '',


        ])->validate();

        $regNumber = Helper::RegistrationNumber();

        $fullName = $request->fullName;
        $gender = $request->gender;
        $matricNumber = $request->matricNumber;
        $department = $request->department;
        $faculty = $request->faculty;
        $level = $request->level;
        $phoneNumber = $request->phoneNumber;
        $email = $request->email;
        $password = $request->password;

        $data = new User();

        $data->regNumber = $regNumber;
        $data->fullName = $request->fullName;
        $data->gender = $request->gender;
        $data->matricNumber = $request->matricNumber;
        $data->faculty = $request->faculty;
        $data->level = $request->level;
        $data->department = $request->department;
        $data->phoneNumber = $request->phoneNumber;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);

        // dd($data);
        $data->save();

        // Alert::success('success_message', 'Registration successful, login and continue !');
        return redirect()->back()->with('success_message','Registration successful, login and continue to booking your hostel accommodation  😊 !');

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $User)
    {
        //
    }
}
