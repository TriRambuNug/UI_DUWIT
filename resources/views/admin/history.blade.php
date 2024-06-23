@extends('layout.base')

@section('title', 'List Topup')

@section('css')
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Topup /</span> Daftar Topup</h4>

    <!-- Bootstrap Table with Header - Footer -->
    <div class="card">
        <h5 class="card-header">Tabel Topup</h5>
        <div class="container">
            <div class="col m-2 ">
                <div class="table-responsive">
                    <table class="table display responsive nowrap" id="topup-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Admin ID</th>
                                <th>Transaction ID</th>
                                <th>Pocket ID</th>
                                <th>Amount</th>
                                <th>Proof</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($topup as $topup)
                            <tr>
                                <td>{{ $topup['id'] }}</td>
                                <td>{{ $topup['admin_id'] }}</td>
                                <td>{{ $topup['transaction_id'] }}</td>
                                <td>{{ $topup['pocket_id'] }}</td>
                                <td>{{ $topup['amount'] }}</td>
                                <td>{{ $topup['proff'] }}</td>
                                <td>{{ $topup['created_at'] }}</td>
                                <td>{{ $topup['updated_at'] }}</td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data topup tidak ditemukan.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Table with Header - Footer -->
@endsection

@section('js_page')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(function() {
            $("#topup-table").DataTable({
                responsive: true,
                paging: true,
                searching: true,
                ordering: true,
                autoWidth: false,
            });
        });
    </script>
@endsection
