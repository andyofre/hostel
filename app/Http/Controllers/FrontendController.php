<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CheckPaymentStatus;
use session;
class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('verify_fee');

    }


    public function checkSchoolFeeStatus(Request $request){

        $request->validate([
            'payment_code' => 'required|numeric',
            'session' => 'required',
        ]);




        $payment_code = request('payment_code');
        $session = request('session');

        $data = CheckPaymentStatus::get($payment_code, $session);

            // dd($data);

            if(collect($data)->isEmpty()) return back()->with('error_message', 'Student Pin invalid, not found in record! Try again. 😞');
                 session(['data' => $data]);

            return redirect()->route('register.student');


    }


    public function registrationForm(){

         $data = session('data');

        // dd($data);

        return view('registration', compact('data'));
    }



    public function checkedFeeStatus(){

        $data = session('data');

        // dd($data);

     return view('registration', compact('data'));




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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}