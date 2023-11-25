<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Register Info Is :</h3>

    @if(isset($name) && isset($age) && isset($loc))
    <ul>
        <li>{{$name}}</li>
        <li>{{$age}}</li>
        <li>{{$loc}}</li>
    </ul>
    @endif
</body>
</html>