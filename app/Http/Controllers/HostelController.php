<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
// use App\Models\PortalFee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $hostels = Hostel::paginate(15);
        $id = $hostels;


        // return view('application.admin.hostel.index', compact('hostels'));

        return view('backend.application.hostel.index', compact('hostels'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('backend.application.hostel.create');
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

        $validator = Validator::make($request->all(), [
            'hostel_name' => 'required|unique:hostels',
            'hostel_type' => 'required',
            'number_of_rooms' => 'required|numeric',

        ])->validate();

         $data = new Hostel();

        $data->hostel_name = $request->hostel_name;
        $data->hostel_type = $request->hostel_type;
        $data->number_of_rooms = $request->number_of_rooms;
        $data->description_location = $request->description_location;
        // dd($data);
        $data->save();
        Alert::success('success', 'New hostel created successfully');
        return redirect()->back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        // $isExist = PortalFee::select("*")
        // ->where("id", $id )
        // ->exists();
        // $student = DB::table('students')->where('id', $id)->get();

        $portalchk = DB::table('portal_fees')->where('student_id' )->get();

        if($portalchk == null){
            dd('No data found');
        }else{
            dd('Data');
        }


        $hostel = Hostel::find($id);

        return view('backend.application.hostel.edit', compact('hostel'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'hostel_name' => 'required|unique:hostels',
            'hostel_type' => 'required',
            'number_of_rooms' => 'required|numeric',

        ])->validate();

         $data =  Hostel::find($id);

        $data->hostel_name = $request->hostel_name;
        $data->hostel_type = $request->hostel_type;
        $data->number_of_rooms = $request->number_of_rooms;
        $data->description_location = $request->description_location;
        // dd($data);
        $data->update();
        // Alert::success('success', 'Hostel updated successfully');

        return redirect()->back();

    }


    


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $hostel = Hostel::where('id', $id)->delete();

        $hostel = Hostel::find($id)->destroy();

        // $hostel->delete();
        return redirect()->back()->with('success_message','Hostel has been deleted successfully', compact('hostel'));


    }
}
