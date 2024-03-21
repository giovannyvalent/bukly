<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['rooms'];
        $rooms = Rooms::orderBy('created_at', 'desc')->paginate(20);

        return view('rooms.index', [
            'rooms' => $rooms
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotels::orderBy('name', 'asc')->get();
        return view('rooms.create', [
            'hotels' => $hotels
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'hotel_id'   => 'required',
            'description'=> 'required'
        ]);

        if($validator->fails()){
            notify()->error('Todos os dados são obrigatórios!');
            return back();
        }

       $hotel = Hotels::find($request->hotel_id);
       $room = new Rooms();
       $room->hotel_id = $hotel->id;
       $room->name = $request->name;
       $room->description = $request->description;
    //    $room->status = $request->status;
       $room->save();

        if($room){
            notify()->success('Quarto registrado com sucesso!');
            return redirect()->route('rooms');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Rooms::find($id);
        $hotels = Hotels::orderBy('name', 'asc')->get();
        return view('rooms.edit', [
            'room' => $room, 
            'hotels' => $hotels
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required',
            'hotel_id'   => 'required',
            'description'=> 'required'
        ]);

        if($validator->fails()){
            notify()->error('Todos os dados são obrigatórios!');
            return back();
        }

       $hotel = Hotels::find($request->hotel_id);
       $room = Rooms::find($request->id);
       $room->hotel_id = $hotel->id;
       $room->name = $request->name;
       $room->description = $request->description;
       $room->save();

        if($room){
            notify()->success('Quarto editado com sucesso!');
            return redirect()->route('rooms');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Rooms::find($id);
        $room->delete();
        notify()->warning('Quarto deletado!');
        return redirect()->route('rooms');
    }
}
