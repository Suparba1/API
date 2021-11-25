<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index()
    {
        $pelanggan = Pelanggan::all();
        $response = [
            'pesan' => 'Data Pelanggan',
            'data' => $pelanggan,
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
            $pelanggan = Pelanggan::create($request->all());
            $response = [
                'pesan' => 'Ditambahkan 1 Pelanggan',
                'data' => $pelanggan,
            ];
            return response($response, 201);
        } catch (\Throwable $th) {
            return response([
                'pesan' => 'Error '. $th,
            ]);
        }
    }

    public function update(Request $request, Pelanggan $pelanggan)
    {
        $p = Pelanggan::findOrFail($pelanggan->id);
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

    public function destroy(Pelanggan $pelanggan)
    {
        $p = Pelanggan::findOrFail($pelanggan->id);
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
