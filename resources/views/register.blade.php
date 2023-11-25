<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Register Here :</h3>
    <form method="POST" action="{{url('/register')}}">
        @csrf
        Enter NAME :
        <input type="text" name="unm">
        <br>
        ENTER AGE :
        <input type="number" name="age">
        <br>
        ENTER LOCATION :
        <input type="text" name="loc">
        <br>
        <input type="submit" value="REGISTER">
    </form>
</body>
</html>