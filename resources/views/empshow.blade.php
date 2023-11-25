<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Employee Info :</h3>
    @if(isset($info))
    <table border="1" bgcolor="lightgreen">
    <tr>
        <th>EmpID</th>
        <th>EMPNAME</th>
        <th>EMPLOC</th>
        <th>EmpDEPT</th>
    </tr>
    @foreach($info as $data)
    <tr>
        <td>{{$data['id']}}</td>
        <td>{{$data['name']}}</td>
        <td>{{$data['loc']}}</td>
        <td>{{$data['dept']}}</td>
    </tr>
    @endforeach
    </table>
    @endif
</body>
</html>