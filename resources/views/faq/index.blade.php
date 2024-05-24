@extends('layouts.app')

@section('title', 'Faq')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">Faq Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <x-card>
                <x-slot name="header">
                    <button onclick="addForm(`{{ route('faq.store') }}`)" class="btn btn-primary"><i
                            class="fas fa-plus-circle"></i> Tambah</button>
                </x-slot>
                <x-table>
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th>Aksi</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
    @include('faq.form')
@endsection

@include('faq.scripts')
