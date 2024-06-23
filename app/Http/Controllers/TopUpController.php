<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TopUpController extends Controller
{
    public function create()
    {
        try {
            $adminsResponse = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/alluser');
            $transactionsResponse = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/alltransaction');
            $pocketsResponse = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/allpocket');

            $admins = [];
            $transactions = [];
            $pockets = [];

            if ($adminsResponse->successful() && $transactionsResponse->successful() && $pocketsResponse->successful()) {
                
                //admin
                $adminResult = $adminsResponse->json();
                $admins = $adminResult['data'];

                //transaction
                $transactionResult = $transactionsResponse->json();
                $transactions = $transactionResult['data'];

                //pocket
                $pocketResult = $pocketsResponse->json();
                $pockets = $pocketResult['data'];
                
                return view('admin.topup', compact('admins', 'transactions', 'pockets'));
            } else {
                return redirect()->route('admin-topup.create')->withErrors('Failed to fetch data from API.');
            }
        } catch (\Exception $e) {
            Log::error('Error fetching data from API: ' . $e->getMessage());
            return redirect()->route('admin-topup.create')->withErrors('An error occurred while fetching data.');
        }
    }

    public function store(Request $request)
    {

        // $db = DB::connection()->getPdo();
        // dd($db);

        $validatedData = $request->validate([
            'admin_id' => 'required',
            'transaction_id' => 'required',
            'pocket_id' => 'required',
            'amount' => 'required|numeric',
            'proff' => 'nullable|string|max:191',
        ]);

        // Make the API request
        $response = Http::withToken(session('token'))->post('http://127.0.0.1:8000/api/admin-topup', $validatedData);

        if ($response->successful()) {
            return redirect()->route('admin-topup.create')->with('status', 'Top up successful!');
        } else {
            return redirect()->route('admin-topup.create')->withErrors($response->json())->withInput();
        }
    }

    public function getTopUp(){
        $response = Http::withToken(session('token'))->get('http://127.0.0.1:8000/api/alltopup-history');
        $topup = [];
        if($response->successful()){
            $result = $response->json();
            $topup = $result['data'];
            return view('admin.history', compact('topup'));
        }
        else{
            return back()->withErrors(['apiError' => 'Gagal mengambil data topup dari API']);
        }
    }
}
