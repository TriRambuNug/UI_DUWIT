<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DetailsAkun extends Controller
{
    public function detailsAccount($id)
    {
        $response = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/user/' . $id);

        $account = [];

        if ($response->status() == 200) {
           $result = $response->json();
           $account = $result['data'];
           Log::info('Data akun: ' . json_encode($account));
           return view('account.show', compact('account'));
        }else{
            return back()->withErrors(['apiError' => 'Gagal mengambil data akun dari API']);
        }
    }

    

    // public function editAccount($id)
    // {
    //     $response = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/update-user/' . $id);

    //     $account = [];
    //     if ($response->status() == 200) {
    //         $result = $response->json();
    //         $account = $result['data'];
    //         Log::info('Data akun: ' . json_encode($account));
    //         return view('account.show', compact('account'));
    //     } else {
    //         return back()->withErrors(['apiError' => 'Gagal mengambil data akun dari API']);
    //     }
    // }

    public function editAccount(Request $request, $id)
    {
        $response = Http::withToken(session('token'))->put('http://127.0.0.1:8000/api/update-user/' . $id, [
            'status' => $request->input('status')
        ]);

        if ($response->status() == 200) {
            return redirect()->route('account.details', ['id' => $id])->with('status', 'Account updated successfully!');
        } else {
            return back()->withErrors(['apiError' => 'Gagal memperbarui data akun dari API']);
        }
    }
}
