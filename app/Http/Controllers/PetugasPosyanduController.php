<?php

namespace App\Http\Controllers;

use App\Models\PetugasPosyandu;
use Illuminate\Http\Request;

class PetugasPosyanduController extends Controller
{
    public function index()
    {
        $petugasPosyandu = PetugasPosyandu::all();
        $response = [
            'pesan' => 'Data Pelanggan',
            'data' => $petugasPosyandu,
        ];
        return response($response, 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        
        try {
            $petugasPosyandu = PetugasPosyandu::create($request->all());
            $response = [
                'pesan' => 'Ditambahkan 1 Pelanggan',
                'data' => $petugasPosyandu,
            ];
            return response($response, 201);
        } catch (\Throwable $th) {
            return response([
                'pesan' => 'Error '. $th,
            ]);
        }
    }

    public function update(Request $request, PetugasPosyandu $petugasPosyandu)
    {
        $p = PetugasPosyandu::findOrFail($petugasPosyandu->id);
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);
        
        try {
            $p->update($request->all());
            $response = [
                'pesan' => 'Terupdate 1 Pelanggan',
                'data' => $p,
            ];
            return response($response, 200);
        } catch (\Throwable $th) {
            return response([
                'pesan' => 'Error '. $th,
            ]);
        }
    }

    public function destroy(PetugasPosyandu $petugasPosyandu)
    {
        $p = PetugasPosyandu::findOrFail($petugasPosyandu->id);
        try {
            $p->delete();
            $response = [
                'pesan' => 'Terhapus 1 Pelanggan',
            ];
            return response($response, 200);
        } catch (\Throwable $th) {
            return response([
                'pesan' => 'Error '. $th,
            ]);
        }
    }
}
