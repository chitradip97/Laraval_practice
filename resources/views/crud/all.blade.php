<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @if($users)
    @foreach($users as $user)
    <div style="background-color: lightblue; border:2px solid green; width:30%;">
        <p><a href="{{url('/edit')}}/{{$user->id}}">Edit</a></p>
    <p><a href="{{url('/delete')}}/{{$user->id}}">DELETE</a></p>
    <p>Name: {{$user->name}}</p>
    <p>Name: {{$user->age}}</p>
    <p>Gender: {{$user->gender}}</p>
    <p>Language: {{$user->language}}</p>
    <P><img src="{{$user->profile_pic}}" height="64px" width="64px"></P>
    <p>{{$user->created}}</p>

    </div>
    <br>
    @endforeach
    @endif
</body>
</html>