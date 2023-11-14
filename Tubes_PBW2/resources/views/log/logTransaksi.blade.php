@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Log Transaksi</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
    var jumlahJual = dataTable.column('tanggal_terima').data().toArray().length > 0;
    var hargaJual = dataTable.column('jumlah_terima').data().toArray().length > 0;
    var tanggalJual = dataTable.column('tanggal_terima').data().toArray().length > 0;

    var jumlahTerima = dataTable.column('tanggal_jual').data().toArray().length > 0;
    var hargaTerima = dataTable.column('jumlah_jual').data().toArray().length > 0;
    var tanggalTerima = dataTable.column('tanggal_jual').data().toArray().length > 0;

    var penjualanData = jumlahJual || hargaJual || tanggalJual;
    var penerimaanData = jumlahTerima || hargaTerima || tanggalTerima;

    if (penjualanData) {
        // If penjualan has data, show the penjualan columns
        dataTable.columns([3, 4, 5]).visible(false);
        dataTable.columns([6, 7, 8]).visible(true);
    } else if (penerimaanData) {
        // If penerimaan has data, show the penerimaan columns
        dataTable.columns([3, 4, 5]).visible(true);
        dataTable.columns([6, 7, 8]).visible(false);
    }
});
    </script>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush