<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>User Info :</h3>
    @if(isset($userinfo))
    <table border="1" bfcolor="lighgreen">
    <tr>
        <th>NAME</th>
        <th>AGE</th>
        <th>GENDER</th>
        <th>LANGUAGE</th>
        <th>EMAIL</th>
        <th>EDUCATION</th>
        <th>PROFILE_IMG</th>
    </tr>
    <tr>
        <td>{{$userinfo['name']}}</td>
        <td>{{$userinfo['age']}}</td>
        <td>{{$userinfo['gender']}}</td>
        <td>{{$userinfo['langdtl']}}</td>
        <td>{{$userinfo['email']}}</td>
        <td>{{$userinfo['degree']}}</td>
        <td><img src="{{$userinfo['profile_pic']}}" width="30%" height="30%" alt="sorry"></td>
    </tr>
    </table>
    @endif
</body>
</html>