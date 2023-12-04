<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <header><h3>Showing All Details :</h3></header>
    @if(isset($post))
    
       
        <ul>
            <li>{{$post->title}}</li>
            <li>{{$post->description}}</li>
        </ul>
       
    
    @endif
    <br>
    {{-- <a href="{{url('/posts')}}"></a> --}}
</body>
</html>