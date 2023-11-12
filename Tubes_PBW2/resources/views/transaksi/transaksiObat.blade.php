@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data') }}</div>

                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('transaksi.storeBeliTransaksi') }}">
                        @csrf
                        
                        <div class="row mb-3 mx-5">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6 mx-2">
                                <input type="radio" id="penerimaan" name="action" value="penerimaan" checked>
                                <label for="penerimaan" class="mx-2">penerimaan</label>
                                <input type="radio" id="penjualan" name="action" value="penjualan">
                                <label for="penjualan" class="mx-1">penjualan</label>
                            </div>
                        </div>

                        <!-- Field for receiving meds -->
                        <div id="penerimaanSection" class="penerimaan-section">
                            <div class="row mb-3">
                                <label for="id_obat" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>
                                <div class="col-md-6">
                                <select name="id_obat" id="id_obat" class="form-select">
                                        @foreach($obatIds as $obatId)
                                            <option value="{{ $obatId }}">{{ $obatId }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <input list="usernames" id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    <!-- Datalist to show usernames -->
                                    <datalist id="usernames">
                                        @foreach($usernames as $username)
                                            <option value="{{ $username }}">
                                        @endforeach
                                    </datalist>

                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_nota" class="col-md-4 col-form-label text-md-end">{{ __('No. Nota') }}</label>

                                <div class="col-md-6">
                                    <input id="no_nota" type="text" class="form-control @error('no_nota') is-invalid @enderror" name="no_nota" value="{{ old('no_nota') }}" required autocomplete="no_nota" autofocus>

                                    @error('no_nota')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>

                                <div class="col-md-6">
                                    <input id="tanggal" type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal" autofocus>

                                    @error('tanggal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="harga_beli" class="col-md-4 col-form-label text-md-end">{{ __('Harga Beli') }}</label>

                                <div class="col-md-6">
                                    <input id="harga_beli" type="number" class="form-control @error('harga_beli') is-invalid @enderror" name="harga_beli" value="{{ old('harga_beli') }}" required autocomplete="harga_beli" autofocus>

                                    @error('harga_beli')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_harga" class="col-md-4 col-form-label text-md-end">{{ __('Total Harga') }}</label>

                                <div class="col-md-6">
                                    <input id="total_harga" type="number" class="form-control @error('total_harga') is-invalid @enderror" name="total_harga" value="{{ old('total_harga') }}" required autocomplete="total_harga" autofocus>

                                    @error('total_harga')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5">
                                <label for="stock_masuk" class="col-md-4 col-form-label text-md-end">{{ __('Stok Masuk') }}</label>

                                <div class="col-md-6">
                                    <input id="stock_masuk" type="number" class="form-control @error('stock_masuk') is-invalid @enderror" name="stock_masuk" value="{{ old('stock_masuk') }}" required autocomplete="stock_masuk" autofocus>

                                    @error('stock_masuk')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-primary mr-2">
                                        {{ __('Submit') }}
                                    </button>
                                    <button type="reset" class="btn btn-danger mx-2">
                                        {{ __('Reset') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Field for selling meds-->
                        <div id="penjualanSection" class="penjualan-section" style="display: none;">
                            
                            <div class="row mb-5">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('penjualan') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('/dashboard') }}">
                                {{ __('Home') }}
                            </a>
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>document.addEventListener('DOMContentLoaded', function () {
    const penerimaanRadio = document.getElementById('penerimaan');
    const penjualanRadio = document.getElementById('penjualan');
    const penerimaanSection = document.getElementById('penerimaanSection');
    const penjualanSection = document.getElementById('penjualanSection');

    penerimaanRadio.addEventListener('change', function () {
        if (this.checked) {
            penerimaanSection.style.display = 'block';
            penjualanSection.style.display = 'none';
            form.method = 'POST';
            form.action = "{{ route('transaksi.storeBeliTransaksi') }}";
        }
    });

    penjualanRadio.addEventListener('change', function () {
        if (this.checked) {
            penerimaanSection.style.display = 'none';
            penjualanSection.style.display = 'block';
            form.method = 'POST';
            form.action = "{{ route('transaksi.storeJualTransaksi') }}";
        }
    });
});
</script>
@endsection
