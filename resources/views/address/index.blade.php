<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Index Address</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Address Index</h1>
            <form class = 'col s3' method = 'get' action = '{{url("address")}}/create'>
                <button class = 'btn btn-primary' type = 'submit'>Create New Address</button>
            </form>
            <br>
            
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                Associate
                <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                    
                    <li><a href="http://localhost:8000/customer">Customer</a></li>
                    
                </ul>
            </div>
            
            <br>
            <table class = "table table-striped table-bordered">
                <thead>
                    
                    <th>alamat</th>
                    
                    <th>kecamatan</th>
                    
                    <th>kabupaten</th>
                    
                    <th>provinsi</th>
                    
                    <th>alamat2</th>
                    
                    
                    
                    
                    <th>namakustomer</th>
                    
                    <th>telepon</th>
                    
                    <th>email</th>
                    
                    <th>password</th>
                    
                    <th>remember_token</th>
                    
                    <th>statusakun</th>
                    
                    <th>created_at</th>
                    
                    <th>updated_at</th>
                    
                    
                    
                    <th>actions</th>
                </thead>
                <tbody>
                    @foreach($addresses as $Address)
                    <tr>
                        
                        <td>{{$Address->alamat}}</td>
                        
                        <td>{{$Address->kecamatan}}</td>
                        
                        <td>{{$Address->kabupaten}}</td>
                        
                        <td>{{$Address->provinsi}}</td>
                        
                        <td>{{$Address->alamat2}}</td>
                        
                        
                        
                                                <td>{{$Address->customer->namakustomer}}</td>

                                                <td>{{$Address->customer->telepon}}</td>

                                                <td>{{$Address->customer->email}}</td>

                                                <td>{{$Address->customer->password}}</td>

                                                <td>{{$Address->customer->remember_token}}</td>

                                                <td>{{$Address->customer->statusakun}}</td>

                                                <td>{{$Address->customer->created_at}}</td>

                                                <td>{{$Address->customer->updated_at}}</td>

                        
                        
                        
                        <td>
                                <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/address/{{$Address->id}}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/address/{{$Address->id}}/edit'><i class = 'material-icons'>edit</i></a>
                                <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/address/{{$Address->id}}'><i class = 'material-icons'>info</i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class = 'AjaxisModal'>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script> var baseURL = "{{URL::to('/')}}"</script>
<script src = "{{ URL::asset('js/AjaxisBootstrap.js')}}"></script>
<script src = "{{ URL::asset('js/scaffold-interface-js/customA.js')}}"></script>
</html>
