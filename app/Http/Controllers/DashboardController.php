<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    
    public function index()
    {
        // URL endpoint API untuk mengambil data akun
        $apiUrl = url('http://127.0.0.1:8000/api/alluser');

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
        $accounts = [];

        // Cek jika data berhasil diambil
        if ($httpcode == 200) {
            $result = json_decode($response, true);
            $accounts = $result['data'];
            return view('account.dashboard', compact('accounts'));
        } else {
            return back()->withErrors(['apiError' => 'Gagal mengambil data akun dari API']);
        }
    }

    public function logout(Request $request)
    {
        $response = Http::withToken(session('token'))->post('http://127.0.0.1:8000/api/logout');
        if($response->status() == 200){
            Session::forget('token');
            return redirect()->route('login')->with('success', 'Logout berhasil');
        }
        else{
            return back()->withErrors(['apiError' => 'Gagal logout']);
        }
    }
}