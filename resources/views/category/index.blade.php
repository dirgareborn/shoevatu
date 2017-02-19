@extends('scaffold-interface.layouts.app')
@section('title','Kategori')
@section('content')
<h2 class="page-title">Kategori</h2>
    <form class = 'col s3' method = 'get' action = '{!!url("category")!!}/create'>
        <button class = 'btn btn-primary btn-circle' type = 'submit'><i class = 'fa fa-plus'></i></button>
    </form><br>
        <!-- Zero Configuration Table -->
                        <div class="panel panel-success">
                            <div class="panel-heading">Daftar Kategori Sepatu</div>
                            <div class="panel-body">
                                <table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                 
                    @foreach($categories as $Categoris)
                    <tr>
                        
                        <td>{{$Categoris->namakategori}}</td>
                        
                        
                        <td>
                        <a class ='btn btn-danger btn-circle' href ="{{url('/category')}}/{!!$Categoris->id!!}/delete" ><i class = 'fa fa-trash'></i></a>
                    <a href = '/category/{!!$Categoris->id!!}/edit' class = 'viewEdit btn btn-warning btn-circle' data-link = '/category/{!!$Categoris->id!!}/edit'><i class = 'fa fa-edit'></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
    </table>
@endsection