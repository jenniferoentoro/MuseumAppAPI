@extends('layouts.app')

@section('title')
<title>EXUM Add Museum</title>
@endsection
@section('style')

@endsection
@section('content')
@include('components.navbar')

<div class="container">
    <form method="POST" action="{{ route('post-add-museum')}}">
    @csrf
    <label for="exampleFormControlInput1" class="form-label">Nama Museum</label>
    <input type="text" name="nama" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Link Gambar Utama</label>
    <input type="text" name="gambarUtama" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Alamat Lengkap</label>
    <input type="text" name="alamatLengkap" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Alamat Kota</label>
    <input type="text" name="alamatKota" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Deskripsi</label>
    <input type="text" name="deskripsi" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Link Google Map</label>
    <input type="text" name="linkGoogleMap" class="form-control">

    <label for="exampleFormControlInput1" class="form-label">Link Virtual Tour</label>
    <input type="text" name="linkVirtualTour" class="form-control">

    <button type="submit" wire:click="save" class="btn btn-primary mt-2">Save</button>
    </form>
</div>

@endsection
@section('script')

@endsection
