@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Tambah Data Stok Opname') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('stockOpname.addStockOpname', $stokOpname) }}">
                            @csrf

                            <input type="hidden" name="id_obat" value="{{ $stokOpname->id_obat }}">
                            <div class="form-group row mb-3">
                                <label for="id_obat" class="col-md-4 col-form-label text-md-end">{{ __('ID Obat') }}</label>
                                <div class="col-md-6">
                                    <input id="id_obat" type="text" class="form-control @error('id_obat') is-invalid @enderror" name="id_obat" value="{{ $stokOpname->id_obat }}" required>
                                    @error('id_obat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="tempat_simpan" class="col-md-4 col-form-label text-md-end">{{ __('Tempat Simpan') }}</label>
                                <div class="col-md-6">
                                    <input id="tempat_simpan" type="text" class="form-control @error('tempat_simpan') is-invalid @enderror" name="tempat_simpan" value="{{ old('tempat_simpan') }}" required>
                                    @error('tempat_simpan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="tanggal_simpan" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Simpan') }}</label>
                                <div class="col-md-6">
                                    <input id="tanggal_simpan" type="date" class="form-control @error('tanggal_simpan') is-invalid @enderror" name="tanggal_simpan" value="{{ old('tanggal_simpan') }}" required>
                                    @error('tanggal_simpan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="stok_keluar" class="col-md-4 col-form-label text-md-end">{{ __('Stok Keluar') }}</label>
                                <div class="col-md-6">
                                    <input id="stok_keluar" type="number" class="form-control @error('stok_keluar') is-invalid @enderror" name="stok_keluar" value="{{ old('stok_keluar') }}" required>
                                    @error('stok_keluar')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="sisa_stock" class="col-md-4 col-form-label text-md-end">{{ __('Sisa Stock') }}</label>
                                <div class="col-md-6">
                                    <input id="sisa_stock" type="number" class="form-control @error('sisa_stock') is-invalid @enderror" name="sisa_stock" value="{{ old('sisa_stock') }}" required>
                                    @error('sisa_stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="keterangan" class="col-md-4 col-form-label text-md-end">{{ __('Keterangan') }}</label>
                                <div class="col-md-6">
                                    <input id="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" value="{{ old('keterangan') }}" required>
                                    @error('keterangan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-primary mr-2">
                                        {{ __('Tambah') }}
                                    </button>
                                    <button type="reset" class="btn btn-danger mx-2">
                                        {{ __('Reset') }}
                                    </button>
                                </div>
                            </div>

                            <div class="flex items-center justify-end mt-4">
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ url('/stockOpname') }}">
                                    {{ __('Stock Opname') }}
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
