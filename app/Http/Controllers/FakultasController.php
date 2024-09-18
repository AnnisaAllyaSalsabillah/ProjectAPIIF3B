<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fakultas = Fakultas::all();
        $data['success'] = true;
        $data['message'] = "Data Fakultas berhasil disimpan";
        $data['result'] = $fakultas;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required|unique:fakultas'
        ]);

        $result = Fakultas::create($validate); //simpan ke tabel fakultas
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Fakultas berhasil disimpan";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Fakultas $fakultas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fakultas $fakultas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'nama' => 'required'
        ]);

        $result = Fakultas::where('id', $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Fakultas berhasil diupdate";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $fakultas = Fakultas::find($id);
        if($fakultas){
            $fakultas->delete(); //hapus data fakultas berdasarkan id
            $data['success'] = true;
            $data['message'] = "Data Fakultas berhasil dihapus";
            return response()->json($data, Response::HTTP_OK);
        }else{
            $data['success'] = false;
            $data['message'] = "Data Fakultas tidak ditemukan";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
