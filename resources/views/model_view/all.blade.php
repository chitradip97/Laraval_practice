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
    @if(isset($info))
    <table border="1" bgcolor="lightpink">
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>
        @foreach($info as $res)
        <tr>
            <td>{{$res->title}}</td>
            <td>{{$res->description}}</td>
            <td>
                <p><a href="{{url('editpost')}}/{{$res->id}}">Edit</a></p>
                <p><a href="{{url('delpost')}}/{{$res->id}}">delete</a></p>
            </td>
        </tr>
        @endforeach
    </table>
     @endif
    <br><br>
    {{-- @if(\Session::has('message'))
    <ul>
        <li>{!! \Session::get('message') !!}</li>
    </ul>
    @endif  --}}

    @if(session('message'))
    <ul>
        <li><b>{{session('message')}}</b></li>
    </ul>
    @endif
</body>
</html>