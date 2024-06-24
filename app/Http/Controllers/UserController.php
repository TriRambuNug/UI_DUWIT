<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function detailsAccount(){

      
        $response = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/user-data');
        $user = [];
        if($response->successful()){
            $result = $response->json();
            $user = $result['data'];
            return view('profile.index', compact('user'));
        }
        else{
            return back()->withErrors(['apiError' => 'Gagal mengambil data user dari API']);
        }
    }

    public function editAccount(Request $request, $id){
        $response = Http::withToken(session('token'))->put('http://127.0.0.1:8000/api/update-user/' . $id, [
            'status' => $request->input('status'),
            'fullname' => $request->input('fullname'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone')
        ]);

        if ($response->status() == 200) {
            return redirect()->route('profile.index', ['id' => $id])->with('status', 'Account updated successfully!');
        } else {
            return back()->withErrors(['apiError' => 'Gagal memperbarui data akun dari API']);
        }
    }

    public function showEditPasswordForm($id)
    {
        $response = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/user/' . $id);
        $user = [];
        if ($response->successful()) {
            $result = $response->json();
            $user = $result['data'];
            return view('profile.edit-password', compact('user'));
        } else {
            return back()->withErrors(['apiError' => 'Gagal mengambil data user dari API']);
        }
    }

    public function editPassword(Request $request, $id)
{
    // Validate the request data
    $validator = Validator::make($request->all(), [
        'current_password' => 'required|string',
        'new_password' => 'required|string|min:6|confirmed',
    ]);

    if ($validator->fails()) {
        return back()->withErrors($validator)->withInput();
    }

    // Log request data
    Log::info('Password update request data: ', $request->all());

    // Make API request to update the password
    $response = Http::withToken(session('token'))->put('http://127.0.0.1:8000/api/update-password/' . $id, [
        'current_password' => $request->input('current_password'),
        'new_password' => $request->input('new_password')
    ]);

    // Log API response
    Log::info('Password update request data', ['data' => $request->all()]);


    if ($response->successful()) {
        return redirect()->route('profile.index', ['id' => $id])->with('status', 'Password updated successfully!');
    } else {
        // Log API error
        Log::error('Error updating password via API: ', ['error' => $response->json()]);

        return back()->withErrors(['apiError' => 'Gagal memperbarui password melalui API']);
    }
}
}
