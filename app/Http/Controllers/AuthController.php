<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function handleLogin(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'password' => 'required|string',
        ]);

        // Data untuk dikirim ke API
        $postData = [
            'phone' => $request->input('phone'),
            'password' => $request->input('password'),
        ];

        // URL endpoint API login
        $apiUrl = url('http://127.0.0.1:8000/api/login');

        // Inisialisasi cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Accept: application/json',
        ]);

        // Eksekusi cURL dan dapatkan respon
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Parse response
        $data = json_decode($response, true);

        // Cek jika login berhasil
        if ($httpcode == 200) {
            // Simpan token di session atau lakukan tindakan lain
            session(['token' => $data['token']]);
            return redirect()->route('dashboard')->with('success', 'Login berhasil');
        } else {
            // Tampilkan error dari API
            return back()->withErrors(['loginError' => $data['message']]);
        }
    }

}
