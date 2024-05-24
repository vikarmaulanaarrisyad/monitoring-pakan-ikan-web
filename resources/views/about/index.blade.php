@extends('layouts.app')

@section('title', 'About')

@section('breadcrumb')
    @parent
    <li class="breadcrumb-item active">About Page</li>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <x-card>
                <x-table>
                    <x-slot name="thead">
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Konten</th>
                        <th>Aksi</th>
                    </x-slot>
                </x-table>
            </x-card>
        </div>
    </div>
    @include('about.form')
@endsection

@include('about.scripts')
