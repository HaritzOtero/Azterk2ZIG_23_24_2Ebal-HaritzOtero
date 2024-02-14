<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yatea;

class YateaController extends Controller
{
    public function store(Request $request){
        $request->validate(['izena'=>'required|min:3']);

        $yatea = new Yatea;
        $yatea->izena = $request->izena;
        $yatea->fabUrtea = $request->fabUrtea;
        $yatea->pertsonaKop = $request->pertsonaKop;

        $yatea->save();

        return redirect()->route('yateak.index') ->with('success', 'Yatea ondo gorde da');
    }

    public function index(){
        $yateak = Yatea::all();
        return view('yateak.index', ['yateak' => $yateak]); //atazak.index viewra eraman yate guztiak
    }

    public function show($id){
        $yatea = Yatea::find($id);
        return view('yateak.show', ['yatea' => $yatea]);
    }

    public function update(Request $request, $id){
        $yatea = Yatea::find($id);
        $yatea->izena = $request->izena;
        $yatea->fabUrtea = $request->fabUrtea;
        $yatea->pertsonaKop = $request->pertsonaKop;
        $yatea->save();

        return redirect()->route('yateak.index') ->with('success', 'Yatea eguneratu da');
    }

    public function destroy($id){
        $yatea = Yatea::find($id);
        $yatea ->delete();

        return redirect()->route('yateak.index') ->with('success', 'Yatea ezabatu da');
    } 
}
