@extends('layouts.app')
@push('css')

    <style>
        
body {
    background: linear-gradient(to right, #A0CDC9 50%, #51BCC3 50%);
    background-size: cover;
    height: 100vh;
    background-position: center;
    background-repeat: no-repeat;
}

.navbar {
    background: linear-gradient(to right, #A0CDC9 50%, #51BCC3 50%);
}
    </style>
@endpush
@section('content')
<div>
    <link href="./frame-ui-homeabout.css" rel="stylesheet" />
    <div>
      <div class="frame-ui-homeabout-frame-ui-homeabout">
        <span class="frame-ui-homeabout-text">
          <span>
            <span>Eco</span>
            <br />
            <span>Hub</span>
          </span>
        </span>
        <span class="frame-ui-homeabout-text05">

        <span class="frame-ui-homeabout-text07"><span>MedTrack</span></span>
        <span class="frame-ui-homeabout-text09">
          <span>
            MedTrack adalah aplikasi berbasis web yang membantu Apoteker
            memonitoring ketersediaan obat, Dimana kita dapat melihat stok dan
            tanggal kadaluarsa obat tersebut tanpa harus mengecek secara manual.
          </span>
        </span>
        <span class="frame-ui-homeabout-text11">
          <span>
            MedTrack juga menampilkan history transaksi pembelian stok dan
            penjualan obat yang memudahkan dalam pendataan obat
          </span>
        </span>
       
        <div class="frame-ui-homeabout-group11">
          <span class="frame-ui-homeabout-text13"><span>Sign in</span></span>
        </div>
        <div class="frame-ui-homeabout-group12">
          <span class="frame-ui-homeabout-text15"><span>Log Out</span></span>
        </div>
        
        <div class="frame-ui-homeabout-group6">
          <div class="frame-ui-homeabout-frameiconplus">
          
          </div>
          <div class="frame-ui-homeabout-frameiconmapmarker">
          
          </div>
          <div class="frame-ui-homeabout-group2">
            <span class="frame-ui-homeabout-text17"><span>MedTra k</span></span>
            <div class="frame-ui-homeabout-frameiconmoon">
             
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
@endsection