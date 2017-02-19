@extends('scaffold-interface.layouts.app')
@section('title','Kategori')
@section('content')
<h2 class="page-title">Edit Kategori</h2>
    <form class = 'col s3' method = 'get' action = '{!!url("category")!!}'>
        <button class = 'btn btn-danger btn-circle' type = 'submit'><i class = 'fa fa-angle-left'></i></button>
    </form><br>
        <!-- Zero Configuration Table -->
                        <div class="panel panel-warning">
                            <div class="panel-heading">Edit Kategori Sepatu</div>
                            <div class="panel-body">
            <br>
            <form method = 'POST' action = '{{url("category")}}/{{$category->id}}/update'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="namakategori">Nama Kategori</label>
                    <input id="namakategori" name = "namakategori" type="text" class="form-control" value="{{$category->namakategori}}">
                </div>
                
                
                <button class = 'btn btn-primary' type ='submit'>Update</button>
            </form>
        </div>
    </div>
@endsection