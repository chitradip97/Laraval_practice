<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Triangle value :</h3>
    <form method="POST" action="{{url('/triangleoutput')}}">
        @csrf
        Enter Length :
        <input type="number" name="len">
        <br>
        ENTER Breath :
        <input type="number" name="br">
        <br>
        ENTER Height :
        <input type="number" name="ht">
        <br>
        <input type="submit" value="REGISTER">
    </form>
</body>
</html>