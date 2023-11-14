@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Data') }}</div>

                <div class="card-body">
                    <form id="form" method="POST" enctype="multipart/form-data" action="{{ route('obat.updateObat', $obat) }}">
                        @csrf
                        
                        <div class="row mb-3 mx-5">
                            <label class="col-md-4 col-form-label text-md-end"></label>
                            <div class="col-md-6 mx-2">
                                <input type="radio" id="update" name="action" value="update" checked>
                                <label for="update" class="mx-2">Update</label>
                                <input type="radio" id="delete" name="action" value="delete">
                                <label for="delete" class="mx-1">Delete</label>
                            </div>
                        </div>

                        <!-- Field for update -->
                        <div id="updateSection" class="update-section">
                            <div class="row mb-3">
                                <label for="id_obat" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>
                                <div class="col-md-6">
                                    <input id="id_obat" type="text" class="form-control @error('id_obat') is-invalid @enderror" name="id_obat" value="{{ $obat->id }}" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="nama_obat" class="col-md-4 col-form-label text-md-end">{{ __('Nama Obat') }}</label>
                                <div class="col-md-6">
                                    <input id="nama_obat" type="text" class="form-control" name="nama_obat" value="{{ $obat->nama_obat }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="stock" class="col-md-4 col-form-label text-md-end">{{ __('Stock Obat') }}</label>
                                <div class="col-md-6">
                                    <input id="stock" type="number" class="form-control" name="stock" value="{{ $obat->stock }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="harga" class="col-md-4 col-form-label text-md-end">{{ __('Harga Obat') }}</label>
                                <div class="col-md-6">
                                    <input id="harga" type="number" class="form-control" name="harga" value="{{ $obat->harga }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tanggal_masuk" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Masuk Obat') }}</label>
                                <div class="col-md-6">
                                    <input id="tanggal_masuk" type="date" class="form-control" name="tanggal_masuk" value="{{ $obat->tanggal_masuk }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="expired" class="col-md-4 col-form-label text-md-end">{{ __('Tanggal Expire Obat') }}</label>
                                <div class="col-md-6">
                                    <input id="expired" type="date" class="form-control" name="expired" value="{{ $obat->expired }}">
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <label for="no_batch" class="col-md-4 col-form-label text-md-end">{{ __('No. Batch Obat') }}</label>
                                <div class="col-md-6">
                                    <input id="no_batch" type="text" class="form-control" name="no_batch" value="{{ $obat->no_batch }}">
                                </div>
                            </div>


                            <div class="row mb-3">
                                <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image (Max file size: 2MB)') }}</label>
                                <div class="col-md-6">
                                    <input id="image" type="file" class="form-control" name="image" accept=".jpg, .png, .jpeg, .gif" placeholder="Max file size: 2MB">
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                            </div>

                            <div class="row mb-5">
                                <div class="col-md-6 offset-md-4">
                                 <button type="submit" class="btn btn-primary mr-2">
                                        {{ __('Update') }}
                                    </button>
                                    <button type="reset" class="btn btn-danger mx-2">
                                        {{ __('Reset') }}
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Field for delete-->
                        <div id="deleteSection" class="delete-section" style="display: none;">
                            <div class="row mb-5">
                                <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('ID') }}</label>
                                <div class="col-md-6">
                                    <select name="id" id="id" class="form-select">
                                        @foreach($obatIds as $obatId)
                                            <option value="{{ $obatId }}">{{ $obatId }}</option>
                                        @endforeach
                                     </select>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Delete') }}
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
    const updateRadio = document.getElementById('update');
    const deleteRadio = document.getElementById('delete');
    const updateSection = document.getElementById('updateSection');
    const deleteSection = document.getElementById('deleteSection');

    updateRadio.addEventListener('change', function () {
        if (this.checked) {
            updateSection.style.display = 'block';
            deleteSection.style.display = 'none';
            form.method = 'POST';
            form.action = "{{ route('obat.updateObat', $obat) }}"; // Change the form action for updating
        }
    });

    deleteRadio.addEventListener('change', function () {
        if (this.checked) {
            updateSection.style.display = 'none';
            deleteSection.style.display = 'block';
            form.method = 'POST';
            form.action = "{{ route('obat.deleteObat', $obat) }}"; // Change the form action for deleting
        }
    });
});
</script>
@endsection
