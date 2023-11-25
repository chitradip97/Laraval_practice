<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if($user)
   
    <div style="background-color: lightblue; border:2px solid green; width:30%;">
    <p>Name: {{$user->name}}</p>
    <p>Name: {{$user->age}}</p>
    <p>Gender: {{$user->gender}}</p>
    <p>Language: {{$user->language}}</p>
    <p>{{$user->created}}</p>

    </div>
    <br>
   
    @endif
</body>
</html>