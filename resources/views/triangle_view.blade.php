<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h3>Triangle value Is :</h3>

@if(isset($area) && isset($volumn) )

 <h3>Area is ={{$area}}</h3>
 <h3>Volumn is ={{$volumn}}</h3>


@endif
</body>
</html>