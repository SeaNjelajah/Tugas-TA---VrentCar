<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\tbl_transmisi;
use Illuminate\Http\Request;

class JenisTransmisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $request->validate([
            'nama_transmisi' => 'required'
        ]);

        tbl_transmisi::create([
            'nama_transmisi' => $request->nama_transmisi
        ]);

        return redirect()->back()->with('success', 'Tambah data Jenis Transmisi Successfull!');
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
        $request->validate([
            'nama_transmisi' => 'required'
        ]);

        $transmisi = tbl_transmisi::find($id);
        $transmisi->update([
            'nama_transmisi' => $request->nama_transmisi
        ]);

        return redirect()->back()->with('success', 'Data was edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transmisi = tbl_transmisi::find($id);
        $transmisi->delete();

        return redirect()->back()->with('success', 'Successfull deleted Jenis Transmisi Mobil');
    }
}
