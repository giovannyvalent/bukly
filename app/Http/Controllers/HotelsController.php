<?php

namespace App\Http\Controllers;

use App\Models\Hotels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ['hotels'];
        $hotels = Hotels::with('rooms')->paginate(30);

        return view('hotels.index', [
            'hotels' => $hotels
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'zip_code'=> 'required',
            'address' => 'required',
            'city'    => 'required',
            'state'   => 'required',
            'website' => 'required',
        ]);

        if($validator->fails()){
            notify()->error('Todos os dados são obrigatórios!');
            return back();
        }

        $hotel = new Hotels;
        $hotel->name = $request->name;
        $hotel->zip_code = $request->zip_code;
        $hotel->address = $request->address;
        $hotel->city = $request->city;
        $hotel->state = $request->state;
        $hotel->website = $request->website;
        $hotel->save();

        if($hotel){
            notify()->success('Hotel registrado com sucesso!');
            return redirect()->route('hotels');
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
        $hotel = Hotels::find($id);
        return view('hotels.edit', [
            'hotel' => $hotel
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'    => 'required',
            'zip_code'=> 'required',
            'address' => 'required',
            'city'    => 'required',
            'state'   => 'required',
            'website' => 'required',
        ]);

        if($validator->fails()){
            notify()->error('Todos os dados são obrigatórios!');
            return back();
        }

        $hotel = Hotels::find($request->id);
        $hotel->name     = $request->name;
        $hotel->address  = $request->address;
        $hotel->city     = $request->city;
        $hotel->state    = $request->state;
        $hotel->zip_code = $request->zip_code;
        $hotel->website  = $request->website;
        $hotel->save();

        if($hotel){
            notify()->success('Hotel editado com sucesso!');
            return back();
        }
    }   

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $hotel = Hotels::find($id);
        $hotel->delete();
        notify()->warning('Hotel deletado!');
        return redirect()->route('hotels');
    }
}
