<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = barang::all();

        // return $data;
        return response()->json([
            "message" => "Load data success",
            "data" => $data
        ], 200);
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
        $table = barang::create([
            "nama_barang" => $request->nama_barang,
            "jenis_barang" => $request->jenis_barang,
            "descripsi_barang" => $request->descripsi_barang,
            "stok_barang" => $request->stok_barang,
            "harga_barang" => $request->harga_barang,
        ]);

        //return $table;
        return response()->json([
            "message" => "Store success",
            "data" => $table
        ], 201);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = barang::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Data not found"];
        }
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
        $table = barang::find($id);
        if($table){
            $table->nama_barang = $request->nama_barang ? $request->nama_barang : $table->nama_barang;
            $table->jenis_barang = $request->jenis_barang ? $request->jenis_barang : $table->jenis_barang;
            $table->descripsi_barang = $request->descripsi_barang ? $request->descripsi_barang : $table->descripsi_barang;
            $table->stok_barang = $request->stok_barang ? $request->stok_barang : $table->stok_barang;
            $table->harga_barang = $request->harga_barang ? $request->harga_barang : $table->harga_barang;
            $table->save();

            return $table;
        }else{
            return ["message" => "Data not found"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = barang::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete success"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
