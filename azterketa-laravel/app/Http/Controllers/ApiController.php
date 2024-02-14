<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Yatea;

class ApiController extends Controller
{
    public function index()
    {
        return  Yatea::all();
    }

    public function store(Request $request)
    {
        $yatea = Yatea::create($request->all());

        return  response()->json($yatea,201);
    }

    public function show($id)
    {
        $yatea = Yatea::find($id);
        return $yatea;
    }
    public function update(Request $request, $id)
    {
        $yatea = Yatea::find($id);
        $yatea->update($request->all());
        return response()->json($yatea,200);
    }
    public function delete(Request $request, $id)
{
    $yatea = Yatea::find($id);
    $yatea->delete();
    return response()->json(null, 204); 
}
}
