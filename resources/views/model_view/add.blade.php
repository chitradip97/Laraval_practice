<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div style="background-color: lightblue; width:60%;border:5px solid green; color:brown;">
        <form method="post" action="{{url('/post_add')}}">
            @csrf
            Title:
            <input type="text" name="t1" required>
            <br>
            Description:
            <textarea name="t2" cols="3" rows="10"></textarea>
            <input type="submit" value="add">
        </form>
    </div>
</body>
</html>