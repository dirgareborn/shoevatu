@extends('scaffold-interface.layouts.app')
@section('title','Kategori')
@section('content')
<h2 class="page-title">Edit Kategori</h2>
    <form class = 'col s3' method = 'get' action = '{!!url("category")!!}'>
        <button class = 'btn btn-danger btn-circle' type = 'submit'><i class = 'fa fa-angle-left'></i></button>
    </form><br>
    <div class="panel panel-primary">
                            <div class="panel-heading">Tambah Kategori Sepatu</div>
                            <div class="panel-body">
            <form method = 'POST' action = '{{url("category")}}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="namakategori">Nama Kategori</label>
                    <input id="namakategori" name = "namakategori" type="text" class="form-control">
                </div>
                
                
                <button class = 'btn btn-primary col s3' type ='submit'>Simpan</button>
            </form>
            </div></div>
@endsection
    