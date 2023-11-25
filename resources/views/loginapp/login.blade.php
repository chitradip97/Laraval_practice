<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    @if($errors->any())
    <ul>
    @foreach($errors->all() as $error)
        <li style="color:red;">{{$error}}</li>
    @endforeach    
    </ul>
    @endif
    <?php
     if(isset($info))
     {
        echo "<div class='alert alert-primary'><strong>Congrats!</strong>$info .</div>"   ;
     } 
     ?>

     <form action="{{'/login_verify'}}" method="POST" enctype="multipart/form-data">
        <table>
            {{-- <form action="{{'/login_verify'}}" method="POST" enctype="multipart/form-data"> --}}
            @csrf
            <tr>
                <td><label>User Email :</label></td>
                <td><input type="email" name="userem" ></td>
            </tr>
            <tr>
                <td><label>Password :</label></td>
                <td><input type="password" name="userpass"></td>
            </tr>
            <tr colspan="2" style="text-align: center;">
                <td ><input type="submit" name="submit_btn" value="submit" class="btn btn-success"></td>
                {{-- <td><a href="/register_form"><button class="btn btn-primary">Register</button></a></td> --}}
            </tr>
        </table>
     </form>
     {{-- <a href="{{url('/register_form')}}"><button class="btn btn-primary">Register</button></a> --}}
     <p>if not registered,<a href="{{url('/register_form')}}">click here to register</a></p>


     
</body>
</html>