@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('obat.storeObat') }}">
                        @csrf

                        
                        <div class="row mb-3">
                            <label for="nama_obat" class="col-md-4 col-form-label text-md-end">{{ __('Nama Obat') }}</label>

                            <div class="col-md-6">
                                <input id="nama_obat" type="text" class="form-control @error('nama_obat') is-invalid @enderror" name="nama_obat" value="{{ old('nama_obat') }}" required autocomplete="nama_obat" autofocus>

                                @error('nama_obat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="row mb-3">
                            <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Jumlah Stok') }}</label>

                            <div class="col-md-6">
                                <input id="stock" type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required autocomplete="stock" autofocus>

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="harga" class="col-md-4 col-form-label text-md-end">{{ __('Harga') }}</label>

                            <div class="col-md-6">
                                <input id="harga" type="number" class="form-control @error('harga') is-invalid @enderror" name="harga" value="{{ old('harga') }}" required autocomplete="harga" autofocus>

                                @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="tanggal_masuk" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Masuk') }}</label>

                            <div class="col-md-6">
                                <input id="tanggal_masuk" type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required autocomplete="tanggal_masuk" autofocus>

                                @error('tanggal_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="expired" class="col-md-4 col-form-label text-md-end">{{ __('expired') }}</label>

                            <div class="col-md-6">
                                <input id="expired" type="date" class="form-control @error('expired') is-invalid @enderror" name="expired" value="{{ old('expired') }}" required autocomplete="expired" autofocus>

                                @error('expired')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_batch" class="col-md-4 col-form-label text-md-end">{{ __('No Batch') }}</label>

                            <div class="col-md-6">
                                <input id="no_batch" type="string" class="form-control @error('no_batch') is-invalid @enderror" name="no_batch" value="{{ old('no_batch') }}" required autocomplete="no_batch" autofocus>

                                @error('no_batch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
