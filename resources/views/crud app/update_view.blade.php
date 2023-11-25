<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>
    

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-10 ">
                            <h5 class="basic_font">Employee data :</h5>
                        </div> 
                        <div class="col-md-2 flex-end">
                        <a href="{{url('/insert_crud')}}"><button type="button" class="btn btn-primary">Insert</button></a>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>Avatar</th>
                                <th>Employee Id</th>
                                <th>Employee NAME</th>
                                <th>Gender</th>
                                <th>Join Date</th>
                                <th>location</th>
                                <th>department</th>
                                <th>emp_type</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            {{-- less id employee --}}
                            @if($less_employes)
                            @foreach($less_employes as $emp)
                            <tr>
                                <form action="{{url('/update_view_ini')}}/{{$emp->emp_id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <td><img src="/{{$emp->avatar}}" height="64px" width="64px"></td>
                                <td>{{$emp->emp_id}}</td>
                                <td>{{$emp->emp_name}}</td>
                                <td>{{$emp->emp_Gender}}</td>
                                <td>{{$emp->emp_join_date}}</td>
                                <td>{{$emp->emp_location}}</td>
                                <td>{{$emp->emp_department}}</td>
                                <td>{{$emp->emp_type}}</td>
                                <td>
                                    <input type="submit"  value="Edit" class="btn btn-success"></form>
                                    {{-- <a href="{{url('/update_view')}}/{{$emp->emp_id}}"><button type="button" class="btn btn-success">Edit</button></a> --}}
                                    <a href="{{url('/delete_crud')}}/{{$emp->emp_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                            {{-- selected employe --}}
                            @if($employes)
                            @foreach($employes as $emp)
                            <tr><form method="POST" action="{{url('/update_crud')}}/{{$emp->emp_id}}"  enctype="multipart/form-data">
                                @csrf
                                <td><img src="/{{$emp->avatar}}" height="64px" width="64px"></td>
                                <td>{{$emp->emp_id}}</td>
                                <td><input type="text" name="emp_nm" value="{{$emp->emp_name}}"></td>
                                <td>
                                    <input type="radio" name="emp_gen" value="Male"{{($emp->emp_Gender)=="Male"?'checked':''}}>M 
                                    <input type="radio" name="emp_gen" value="Female"{{($emp->emp_Gender)=="Female"?'checked':''}}>F
                                </td>
                                <td><input type="date" name="emp_join" value="{{$emp->emp_join_date}}"></td>
                                <td><input type="text" name="emp_loc" value="{{$emp->emp_location}}"></td>
                                <td>
                                    <select name="emp_dpt" id="">
                                        <option value=""><--select dept--></option>
                                            <option value="Accountant" {{($emp->emp_department)=="Accountant"?'selected':''}}>Accountant</option>
                                            <option value="Maneger" {{($emp->emp_department)=="Maneger"?'selected':''}}>Maneger</option>
                                            <option value="Programmer" {{($emp->emp_department)=="Programmer"?'selected':''}}>Programmer</option>
                                            <option value="Designer" {{($emp->emp_department)=="Designer"?'selected':''}}>Designer</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="checkbox" name="emp_typ" value="fulltime" {{($emp->emp_type)=="fulltime"?'checked':''}}>Fulltime <br>
                                    <input type="checkbox" name="emp_typ" value="partime" {{($emp->emp_type)=="partime"?'checked':''}}>Partime <br>
                                    <input type="checkbox" name="emp_typ" value="contractual" {{($emp->emp_type)=="contractual"?'checked':''}}>Contract 
                                </td>
                                <td>
                                    <input type="submit"  value="Done" class="btn btn-success"></form>
                                    <a href="{{url('/delete_crud')}}/{{$emp->emp_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif

                            {{-- greater id employee --}}
                            @if($greater_employes)
                            @foreach($greater_employes as $emp)
                            <tr>
                                <form action="{{url('/update_view_ini')}}/{{$emp->emp_id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                <td><img src="/{{$emp->avatar}}" height="64px" width="64px"></td>
                                <td>{{$emp->emp_id}}</td>
                                <td>{{$emp->emp_name}}</td>
                                <td>{{$emp->emp_Gender}}</td>
                                <td>{{$emp->emp_join_date}}</td>
                                <td>{{$emp->emp_location}}</td>
                                <td>{{$emp->emp_department}}</td>
                                <td>{{$emp->emp_type}}</td>
                                <td>
                                    <input type="submit"  value="Edit" class="btn btn-success"></form>
                                    {{-- <a href="{{url('/update_view')}}/{{$emp->emp_id}}"><button type="button" class="btn btn-success">Edit</button></a> --}}
                                    <a href="{{url('/delete_crud')}}/{{$emp->emp_id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    
            </div>
        </div>
    </div>
</body>
</html>