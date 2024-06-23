<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
            'phone' => $request->input('phone'),
            'pin' => $request->input('pin'),
            'password' => $request->input('password'),
        ]);

        if ($response->status() == 200) {
            return redirect()->route('profile.index', ['id' => $id])->with('status', 'Account updated successfully!');
        } else {
            return back()->withErrors(['apiError' => 'Gagal memperbarui data akun dari API']);
        }
    }
}
