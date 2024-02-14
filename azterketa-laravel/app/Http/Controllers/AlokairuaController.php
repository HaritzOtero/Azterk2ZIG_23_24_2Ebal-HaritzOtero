<?php

namespace App\Http\Controllers;
//pretsonak-> alokairuak
//lanak-> yateak
use Illuminate\Http\Request;
use App\Models\Yatea;
use App\Models\Alokairua;

class AlokairuaController extends Controller
{
    public function index()
    {
        //
        $alokairuak = Alokairua::all();
        $yateak = Yatea::all();
        return view('alokairuak.index',['alokairuak' => $alokairuak, 'yateak' => $yateak]);
    }

     function store(Request $request)
    {
        //
        $request->validate([
            'alokIzena' => 'required|min:3',
            'yate_id' => 'required' 
        ]);
   
        $alokairua = new Alokairua();
        $alokairua->alokIzena = $request->alokIzena;
        $alokairua->yate_id = $request->yate_id;
        $alokairua->save();
   
        return redirect()->route('alokairua.index')->with('success','alokairua ondo gorde da');
    }


    public function update(Request $request, int $id)
{
    $request->validate([
        'alokIzena' => 'required|min:3',
        'yate_id' => 'required'
    ]);

    $alokairua = Alokairua::findOrFail($id);
    $alokairua->alokIzena = $request->alokIzena;
    $alokairua->yate_id = $request->yate_id;
    $alokairua->save();

    return redirect()->route('alokairua.index')->with('success','alokairua ondo eguneratu da');
}

    public function destroy(string $id)
    {
        //
        $alokairua = Alokairua::find($id);
        $alokairua->delete();


        return redirect()->route('alokairua.index')->with('success', 'alokairua ezabatua');
    }

    public function show($id)
    {
        $alokairua = Alokairua::find($id);
        $yateak = Yatea::all();
        return view('alokairuak.show', ['alokairua' => $alokairua, 'yateak' => $yateak]);
    }
}
