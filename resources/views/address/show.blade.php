<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Show Address</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Show Address</h1>
            <br>
            <form method = 'get' action = '{{url("address")}}'>
                <button class = 'btn btn-primary'>Address Index</button>
            </form>
            <br>
            <table class = 'table table-bordered'>
                <thead>
                    <th>Key</th>
                    <th>Value</th>
                </thead>
                <tbody>

                    
                    <tr>
                        <td>
                            <b><i>alamat : </i></b>
                        </td>
                        <td>{{$address->alamat}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>kecamatan : </i></b>
                        </td>
                        <td>{{$address->kecamatan}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>kabupaten : </i></b>
                        </td>
                        <td>{{$address->kabupaten}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>provinsi : </i></b>
                        </td>
                        <td>{{$address->provinsi}}</td>
                    </tr>
                    
                    <tr>
                        <td>
                            <b><i>alamat2 : </i></b>
                        </td>
                        <td>{{$address->alamat2}}</td>
                    </tr>
                    

                                                
                        
                        <tr>
                        <td>
                            <b><i>namakustomer : </i><b>
                        </td>
                        <td>{{$address->customer->namakustomer}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>telepon : </i><b>
                        </td>
                        <td>{{$address->customer->telepon}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>email : </i><b>
                        </td>
                        <td>{{$address->customer->email}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>password : </i><b>
                        </td>
                        <td>{{$address->customer->password}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>remember_token : </i><b>
                        </td>
                        <td>{{$address->customer->remember_token}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>statusakun : </i><b>
                        </td>
                        <td>{{$address->customer->statusakun}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>created_at : </i><b>
                        </td>
                        <td>{{$address->customer->created_at}}</td>
                        </tr>
                        
                        <tr>
                        <td>
                            <b><i>updated_at : </i><b>
                        </td>
                        <td>{{$address->customer->updated_at}}</td>
                        </tr>
                        
                        
                        
                </tbody>
            </table>
        </div>
    </body>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
