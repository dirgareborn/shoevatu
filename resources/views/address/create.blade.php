<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Create Address</title>
    </head>
    <body>
        <div class = 'container'>
            <h1>Create Address</h1>
            <form method = 'get' action = '{{url("address")}}'>
                <button class = 'btn btn-danger'>Address Index</button>
            </form>
            <br>
            <form method = 'POST' action = '{{url("address")}}'>
                <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
                
                <div class="form-group">
                    <label for="alamat">alamat</label>
                    <input id="alamat" name = "alamat" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="kecamatan">kecamatan</label>
                    <input id="kecamatan" name = "kecamatan" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="kabupaten">kabupaten</label>
                    <input id="kabupaten" name = "kabupaten" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="provinsi">provinsi</label>
                    <input id="provinsi" name = "provinsi" type="text" class="form-control">
                </div>
                
                <div class="form-group">
                    <label for="alamat2">alamat2</label>
                    <input id="alamat2" name = "alamat2" type="text" class="form-control">
                </div>
                
                
                <div class="form-group">
                    <label>customers Select</label>
                    <select name = 'customer_id' class = 'form-control'>
                        @foreach($customers as $key => $value)
                        <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                
                <button class = 'btn btn-primary' type ='submit'>Create</button>
            </form>
        </div>
    </body>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</html>
