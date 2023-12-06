<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if(isset($post))
    <form action="{{url('/upd_post')}}" method="post">
        @csrf
        Title:
        <input type="text" name="editTitle" required value="{{$post->title}}"/>
        <br>
        Description :
        <input type="text" name="editDesc" required value="{{$post->description}}">
        <br>
        <input type="hidden" name="hid" value="{{$post->id}}">
        <br>
        <input type="submit" value="UPDATE" />
    </form>
    @endif
</body>
</html>