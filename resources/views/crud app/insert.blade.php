<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <style>
        body{
            background-color:rgb(202, 195, 195);
        }
    </style>
</head>
<body>
    @if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li style="color:red;">{{$error}}</li>
        @endforeach
    </ul>
    @endif
    <div class="main_div" style="width=100%;">
    <center>
        <div class="main_div" style="background-color:lightblue; height:auto; width:50%; margin-top:80px;">
        <form method="POST" action="{{'/submit_crud'}}"  enctype="multipart/form-data">
            @csrf
            <table>
                <caption><b><u><h2>Employee data :-</h2></u></b></caption>
                <tr>
                    <td>
                        <label>Employee Name :</label>
                    </td>
                    <td>
                        <input type="text" name="emp_nm" value="{{old('emp_nm')}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Password :</label>
                    </td>
                    <td>
                        <input type="password" name="emp_pass" value="{{old('emp_pass')}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Employee Gender :</label>
                    </td>
                    <td>
                        <input type="radio" name="emp_gen" value="Male"{{old('emp_gen')=="Male"?'checked':''}}>Male
                        <input type="radio" name="emp_gen" value="Female"{{old('emp_gen')=="Female"?'checked':''}}>Female
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Date of Joining :</label>
                    </td>
                    <td>
                        <input type="date" name="emp_join" value="{{old('emp_join')}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Employee Loc :</label>
                    </td>
                    <td>
                        <input type="text" name="emp_loc" value="{{old('emp_loc')}}">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Employee Dept :</label>
                    </td>
                    <td>
                        <select name="emp_dpt" id="">
                            <option value=""><--select dept--></option>
                                <option value="Accountant" {{(collect(old('emp_dpt'))->contains("Accountant"))?'selected':''}}>Accountant</option>
                                <option value="Maneger" {{(collect(old('emp_dpt'))->contains("Maneger"))?'selected':''}}>Maneger</option>
                                <option value="Programmer" {{(collect(old('emp_dpt'))->contains("Programmer"))?'selected':''}}>Programmer</option>
                                <option value="Designer" {{(collect(old('emp_dpt'))->contains("Designer"))?'selected':''}}>Designer</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Employee Type :</label>
                    </td>
                    <td>
                        <input type="checkbox" name="emp_typ" value="fulltime" {{old('emp_typ')=="fulltype"?'checked':''}}>Fulltime
                        <input type="checkbox" name="emp_typ" value="partime" {{old('emp_typ')=="parttime"?'checked':''}}>Parttime
                        <input type="checkbox" name="emp_typ" value="contractual" {{old('emp_typ')=="contractual"?'checked':''}}>Contractual
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    Upload profile pic:
                    <input type="file" name="avatar">
                    </td>
                </tr>
                <tr >
                    <td colspan="2" style="text-align: center">
                        <input type="submit"  value="Submit">
                    </td>
                </tr>
            </table>
        </form>
        <a href="{{url('/view_crud')}}"><button type="button" class="btn btn-primary">View</button></a>
        @if(isset($info))
        <div style="background-color: lightgreen;width:60%;border:5px solid gray;color:blue">
            <h3>{{$info}}</h3>
        </div>
        @endif
    </div>
    </center>
</div>
</body>
</html>