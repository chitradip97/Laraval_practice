<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        echo "<div class='alert alert-primary'><strong>Sorry!</strong>$info .</div>"   ;
     } 
     ?>
    <form action="{{'/register'}}" method="post" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
           <td> 
            <label>Username</label>
        </td>
        <td>
            <input type="text" name="unm" value="{{old('unm')}}">
           </td>
        </tr>
        <tr>
            <td>
                <label>Password</label>
            </td>
            <td>
                <input type="password" name="pass" value="{{old('pass')}}">
            </td>
        </tr>
        <tr>
            <td>
                <label>Email</label>
            </td>
            <td>
                <input type="email" name="em" value="{{old('em')}}">
            </td>
        </tr>
        <tr>
            <td><label>Location</label></td>
            <td><input type="text" name="loc" value="{{old('loc')}}"></td>
        </tr>
   
    <tr><td><input type="submit" name="submit_btn" value="Submit"></td></tr>
</table>
</form>
</body>
</html>