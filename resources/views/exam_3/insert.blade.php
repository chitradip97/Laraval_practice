<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <form action="{{'/insert_data'}}"  method="POST" enctype="multipart/form-data">
        @csrf
    <table>
        <tr>
            <td>Book_id</td>
            <td><input type="number" name="book_id" ></td>
        </tr>
        <tr>
            <td>Book_name</td>
            <td><input type="text" name="Book_nm" ></td>
        </tr>
        <tr>
            <td>Book_author</td>
            <td><input type="text" name="Book_author" ></td>
        </tr>
        <tr>
            <td>Pub_code</td>
            <td><input type="text" name="Pub_code" ></td>
        </tr>
        <tr>
            <td>Pub_name</td>
            <td><input type="text" name="Pub_name" ></td>
        </tr>
        <tr>
            <td>Pub_Address</td>
            <td><input type="text" name="Pub_Address" ></td>
        </tr>
        <tr>
            <td>Pub_cost</td>
            <td><input type="text" name="Pub_cost" ></td>
        </tr>
        
        <tr>
            
                <td colspan="2" style="text-align: center">
                    <input type="submit"  value="Submit">
                </td>
            
        </tr>
    </table>
</form>
@if(isset($info))
<div style="background-color: lightgreen;width:60%;border:5px solid gray;color:rgb(11, 100, 7)">
    <h3>{{$info}}</h3>
</div>
@endif

<div id="search">
    <form action="{{'/search_data'}}" method="POST" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
            <td>Search Book Id :</td>
            <td><input type="number" name="book_id"></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <input type="submit"  value="Submit">
                </td>
            </tr>
            
            
        </table>
    </form>

</div>
@if(isset($all_data))
<div >
    <table class='table table-hover table-bordered'>
        <tr>
        <th>Book_id:</th>
        <th>Book_name:</th>
        <th>Book_author :</th>
        <th>Pub_code:</th>
        <th>Pub_name:</th>
        <th>Pub_Address:</th>
        <th>Pub_cost :</th>
        </tr>
        {{-- @foreach($all_data as $data) --}}
            <tr>
                <td>{{$all_data['book_id']}}</td>
                <td>{{$all_data['Book_name']}}</td>
                <td>{{$all_data['Book_author']}}</td>
                <td>{{$all_data['Pub_code']}}</td>
                <td>{{$all_data['Pub_name']}}</td>
                <td>{{$all_data['Pub_Address']}}</td>
                <td>{{$all_data['Pub_cost'] }}</td>
                </tr>
        {{-- @endforeach --}}
        </table>
    
</div>
@endif

{{-- @if(isset($all_data))
<div >
    <table class='table table-hover table-bordered'>
        <tr>
        <th>Book_id:</th>
        <th>Book_name:</th>
        <th>Book_author :</th>
        <th>Pub_code:</th>
        <th>Pub_name:</th>
        <th>Pub_Address:</th>
        <th>Pub_cost :</th>
        </tr>
        
            <tr>
                <td>{{$book_id}}</td>
                <td>{{$Book_name}}</td>
                <td>{{$Book_author}}</td>
                <td>{{$Pub_code}}</td>
                <td>{{$Pub_name}}</td>
                <td>{{$Pub_Address}}</td>
                <td>{{$Pub_cost }}</td>
                </tr>
        
        </table>
    
</div> --}}
{{-- @endif --}}
</body>
</html>