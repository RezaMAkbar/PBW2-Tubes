@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Data Stock Opname</div>
            <!-- Buat testing<img src="storage/images/Dan Reynold Cave exploring.jpg" border="0" width="40" class="img-rounded" align="center"> -->
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
 
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush