<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\checkout;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = checkout::all();

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
        $table = checkout::create([
            "nama_pembeli" => $request->nama_pembeli,
            "nama_barang" => $request->nama_barang,
            "nohp_pembeli" => $request->nohp_pembeli,
            "alamat_pembeli" => $request->alamat_pembeli,
            "total_barang" => $request->total_barang,
            "harga_barang" => $request->harga_barang,
        ]);
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
        $table = checkout::find($id);
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
        $table = checkout::find($id);
        if($table){
            $table->nama_barang = $request->nama_barang ? $request->nama_barang : $table->nama_barang;
            $table->nama_pembeli = $request->nama_pembeli ? $request->nama_pembeli : $table->nama_pembeli;
            $table->nohp_pembeli = $request->nohp_pembeli ? $request->nohp_pembeli : $table->nohp_pembeli;
            $table->alamat_pembeli = $request->alamat_pembeli ? $request->alamat_pembeli : $table->alamat_pembeli;
            $table->total_barang = $request->total_barang ? $request->total_barang : $table->total_barang;
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
        $table = checkout::find($id);
        if($table){
            $table->delete();
            return ["message" => "Delete success"];
        }else{
            return ["message" => "Data not found"];
        }
    }
}
