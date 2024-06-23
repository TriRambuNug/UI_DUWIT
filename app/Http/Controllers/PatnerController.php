<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PatnerController extends Controller
{
    public function index()
    {
        // URL endpoint API untuk mengambil data akun
        $apiUrl = url('http://127.0.0.1:8000/api/allpatner');

        // Inisialisasi cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . session('token'), // Asumsi token disimpan di session
        ]);

        // Eksekusi cURL dan dapatkan respon
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Parse response
        $patners = [];

        // Cek jika data berhasil diambil
        if ($httpcode == 200) {
            $result = json_decode($response, true);
            $patners = $result['data'];
            return view('patner.index', compact('patners'));
        } else {
            return back()->withErrors(['apiError' => 'Gagal mengambil data akun dari API']);
        }
    }

    public function detailsPatner($id)
    {
        $response = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/patner/'. $id);

        $patners = [];

        if ($response->status() == 200) {
            $result = $response->json();
            $patners = $result['data'];
            return view('patner.show', compact('patners'));
        } else {
            return back()->withErrors(['apiError' => 'Gagal mengambil data akun dari API']);
        }
    }

    public function editPatner(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put('http://127.0.0.1:8000/api/update-patner/' . $id, [
            'status' => $request->input('status')
        ]);

        if ($response->status() == 200) {
            return redirect()->route('patner.details', ['id' => $id])->with('status', 'Account updated successfully!');
        } else {
            return back()->withErrors(['apiError' => 'Gagal memperbarui data akun dari API']);
        }
    }
    
}
