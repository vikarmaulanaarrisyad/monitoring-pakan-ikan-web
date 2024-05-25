@extends('layouts.app')

@section('title', 'Data Sensor Minum')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Data Sensor</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <x-card>
                <x-slot name="header">
                    <button class="btn btn-sm btn-danger" onclick="deleteData(`{{ route('api.sensorminum.delete_all') }}`)"><i
                            class="fas fa-trash"></i> Hapus
                        Data</button>
                </x-slot>
                <x-table>
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Presentase Minum %</th>
                        <th>Status</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
@endsection
@include('datasensor.minum.scripts')
