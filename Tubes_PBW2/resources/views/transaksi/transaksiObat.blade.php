@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data') }}</div>

                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('transaksi.storeTerima') }}">
                        @csrf
                        
                        <div class="row mb-3 mx-5">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6 mx-2">
                                <input type="radio" id="penerimaan" name="action" value="penerimaan" checked>
                                <label for="penerimaan" class="mx-2">Penerimaan</label>
                                <input type="radio" id="penjualan" name="action" value="penjualan">
                                <label for="penjualan" class="mx-1">Penjualan</label>
                            </div>
                        </div>

                        <!-- Field for penerimaan -->
                        <div id="penerimaanSection" class="penerimaan-section">
                            <div class="row mb-3">
                                <label for="id_obat_nerima" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>
                                <div class="col-md-6">
                                    <select name="id_obat_nerima" id="id_obat_nerima" class="form-select">
                                        @foreach($obatIds as $obatId)
                                            <option value="{{ $obatId }}">{{ $obatId }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="no_nota" class="col-md-4 col-form-label text-md-end">{{ __('No Nota') }}</label>
                                <div class="col-md-6">
                                    <input id="no_nota" type="text" class="form-control" name="no_nota" value="{{ old('no_nota') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="usernamePenerimaan" class="col-md-4 col-form-label text-md-end">{{ __('Username penjaga') }}</label>

                                <div class="col-md-6">
                                    <input list="usernames" id="usernamePenerimaan" type="text" class="form-control @error('usernamePenerimaan') is-invalid @enderror" name="usernamePenerimaan" value="{{ old('usernamePenerimaan') }}">

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
                                <label for="tanggal" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal') }}</label>
                                <div class="col-md-6">
                                    <input id="tanggal" type="date" class="form-control" name="tanggal" value="{{ old('tanggal') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="harga_beli" class="col-md-4 col-form-label text-md-end">{{ __('Harga Beli') }}</label>
                                <div class="col-md-6">
                                    <input id="harga_beli" type="number" class="form-control" name="harga_beli" value="{{ old('harga_beli') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_harga_penerimaan" class="col-md-4 col-form-label text-md-end">{{ __('Total Harga') }}</label>
                                <div class="col-md-6">
                                    <input id="total_harga_penerimaan" type="number" class="form-control" name="total_harga_penerimaan" value="{{ old('total_harga_penerimaan') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stock_masuk" class="col-md-4 col-form-label text-md-end">{{ __('Stock Masuk') }}</label>
                                <div class="col-md-6">
                                    <input id="stock_masuk" type="number" class="form-control" name="stock_masuk" value="{{ old('stock_masuk') }}">
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
                
                        <!-- Field for delete-->
                        <div id="penjualanSection" class="penjualan-section" style="display: none;">

                            <div class="row mb-3">
                                <label for="id_obat_jual" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>
                                <div class="col-md-6">
                                    <select name="id_obat_jual" id="id_obat_jual" class="form-select">
                                        @foreach($obatIds as $obatId)
                                            <option value="{{ $obatId }}">{{ $obatId }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="usernamePenjualan" class="col-md-4 col-form-label text-md-end">{{ __('Username penjaga') }}</label>

                                <div class="col-md-6">
                                    <input list="usernames" id="usernamePenjualan" type="text" class="form-control @error('usernamePenjualan') is-invalid @enderror" name="usernamePenjualan" value="{{ old('usernamePenjualan') }}">

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
                                <label for="tanggal_transaksi" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Transaksi') }}</label>
                                <div class="col-md-6">
                                    <input id="tanggal_transaksi" type="date" class="form-control" name="tanggal_transaksi" value="{{ old('tanggal_transaksi') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_harga_penjualan" class="col-md-4 col-form-label text-md-end">{{ __('Total Harga') }}</label>
                                <div class="col-md-6">
                                    <input id="total_harga_penjualan" type="number" class="form-control" name="total_harga_penjualan" value="{{ old('total_harga_penjualan') }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="total_barang" class="col-md-4 col-form-label text-md-end">{{ __('Total Barang') }}</label>
                                <div class="col-md-6">
                                    <input id="total_barang" type="number" class="form-control" name="total_barang" value="{{ old('total_barang') }}">
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                    <button type="reset" class="btn btn-danger mx-2">
                                        {{ __('Reset') }}
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
            form.action = "{{ route('transaksi.storeTerima') }}";
        }
    });

    penjualanRadio.addEventListener('change', function () {
        if (this.checked) {
            penerimaanSection.style.display = 'none';
            penjualanSection.style.display = 'block';
            form.method = 'POST';
            form.action = "{{ route('transaksi.storeJual') }}";
        }
    });
});
</script>
@endsection
