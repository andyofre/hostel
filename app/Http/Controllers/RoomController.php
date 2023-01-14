<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $room = Room::paginate(15);


        return view('backend.application.room.index', compact('room'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $room = Room::with('getHostel')->get();

        // dd($room);

        return view('backend.application.room.create', compact('room'));
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
                'room_no' => 'required',
                'hostel_id' => 'required',
                'type' => 'required',
                'bed' => 'required|numeric'

        ])->validate();

        $data = new Room();
        $data->room_no = $request->room_no;
        $data->hostel_id = $request->hostel_id;
        $data->type = $request->type;
        $data->bed = $request->bed;
            dd($data);
        $data->save();
        Alert::success('success', 'New Room created successfully');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
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
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        //
    }
}