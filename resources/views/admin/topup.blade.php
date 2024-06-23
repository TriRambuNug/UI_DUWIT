@extends('layout.base')

@section('title', 'Admin Top Up')

@section('css')

@endsection

@section('content')

<h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Admin / Top Up /</span> New Top Up</h4>

<div class="row">
     <div class="col-md-12">
          <div class="card mb-4">
               <h5 class="card-header">Admin Top Up</h5>
               <div class="card-body">
                    <form id="adminTopupForm" method="POST" action="{{ route('admin-topup.store') }}">
                         @csrf
                         <div class="row">
                              <div class="mb-3 col-md-6">
                                   <label for="admin_id" class="form-label">Admin</label>
                                   <select class="form-select" id="admin_id" name="admin_id" required>
                                        @foreach($admins as $admin)
                                            <option value="{{ $admin['id'] }}">{{ $admin['fullname'] }}</option>
                                        @endforeach
                                   </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                   <label for="transaction_id" class="form-label">Transaction</label>
                                   <select class="form-select" id="transaction_id" name="transaction_id" required>
                                        @foreach($transactions as $transaction)
                                            <option value="{{ $transaction['id'] }}">{{ $transaction['id'] }}</option>
                                        @endforeach
                                   </select>
                              </div>
                         </div>
                         <div class="row">
                              <div class="mb-3 col-md-6">
                                   <label for="pocket_id" class="form-label">Pocket</label>
                                   <select class="form-select" id="pocket_id" name="pocket_id" required>
                                        @foreach($pockets as $pocket)
                                            <option value="{{ $pocket['id'] }}">{{ $pocket['name'] }} - {{ $pocket['balance'] }}</option>
                                        @endforeach
                                   </select>
                              </div>
                              <div class="mb-3 col-md-6">
                                   <label for="amount" class="form-label">Amount</label>
                                   <input class="form-control" type="number" id="amount" name="amount" required />
                              </div>
                         </div>
                         <div class="row">
                              <div class="mb-3 col-md-12">
                                   <label for="proff" class="form-label">Proof (optional)</label>
                                   <input class="form-control" type="text" id="proff" name="proff" maxlength="191" />
                              </div>
                         </div>
                         <div class="mt-2">
                              <button type="submit" class="btn btn-primary me-2">Submit</button>
                              <a href="{{ route('dashboard') }}" class="btn btn-secondary">Cancel</a>
                         </div>
                         @if (session('status'))
                              <div class="alert alert-success mt-3">
                                   {{ session('status') }}
                              </div>
                         @endif
                         @if ($errors->any())
                              <div class="alert alert-danger mt-3">
                                   <ul>
                                        @foreach ($errors->all() as $error)
                                             <li>{{ $error }}</li>
                                        @endforeach
                                   </ul>
                              </div>
                         @endif
                    </form>
               </div>
          </div>
     </div>
</div>

@endsection

@section('js_page')

@endsection
