<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


</head>
<body>

    <script>
        
        function edit(id){
            var item_id=id;
            console.log("hello");
            
            console.log(id);
            $.ajax({
                
                'url':`{{url('/edit_backend')}}/${id}`,
                'method':'post',
                'data':{'_token':'{{csrf_token()}}'},
                'success':function(data,status){
                    if(status=="success")
                    {
                         console.log(data);
                         var jsonData = data.data;
                         console.log(jsonData);
                         content=``;
                        jsonData.forEach((val)=>{
                         content=content+`
                         <td>${val.id}</td>
                         <td><input type="text" name="utitle" class="utitle" value="${val.title}"></td>
                         <td><input type="text" name="udesc" class="udesc" value="${val.descripton}"></td>
                         <td>${val.created}</td>
                         <td>
                           <button onclick="update(${id})" class="btn btn-success">Done</button>
                                   <button onclick="delete_data()" class="btn btn-danger">Delete</button>
                           </td>
                         
                         `;
                         })
                        $(`#select_row${item_id}`).html(content);
                     }
                 },
                  'error':function (error){
                      if(error) throw error;
                  }
             });
         }
                        
         function  update(id)
         {
            var item_id=id;
            var title=$('.utitle').val();
            var desc=$('.udesc').val();
            
            $.ajax({
                'url':`{{url('/update_todo_app')}}/${id}`,
                'method':'post',
                'data':{'_token':'{{csrf_token()}}',
                        'title':title,
                        'desc':desc
                        },
                'success':function(data,status){
                    if(status=="success")
                    {
                         console.log(data);
                         var jsonData = data.data;
                         console.log(jsonData);
                         content=``;
                        jsonData.forEach((val)=>{
                         content=content+`
                         <td>${val.id}</td>
                         <td>${val.title}</td>
                         <td>${val.descripton}</td>
                         <td>${val.created}</td>
                         <td>
                           <button onclick="update(${id})" class="btn btn-success">Edit</button>
                                   <button onclick="delete_data()" class="btn btn-danger">Delete</button>
                           </td>
                         
                         `;
                         })
                        $(`#select_row${item_id}`).html(content);
                     }
                 },
                  'error':function (error){
                      if(error) throw error;
                  }
            })
         }
         
         function delete_data(id)
        {
            console.log("hello");
            
            $.ajax({
                'url':`{{url('/delete_todo_app')}}/${id}`,
                'method':'post',
                'data':{
                    '_token':'{{csrf_token()}}'
                    
                },
                'success':function(data,status){
                    if(status=="success")
                    {
                        console.log(data);
                        location.reload();
                        // $('#info').html(`<h4 style="color:green; font-weight: bold">${data.message}</h4>`);
                        $('#info').html(`<div class='alert alert-danger'>Your data has <strong>${data.message}</strong>.</div>`);
                    
                    }  
                },
                'error':function (error){
                    console.log(error);
                }
            });
        }

        function addTodo(){
              var todoData = {
                  'id':$('#item_id').val(),
                  'title': $('#titleText').val(),
                  'description' : $('#descText').val(),
                  '_token':'{{csrf_token()}}'
              };


              console.log(todoData);
              $.ajax({
                'url':'{{url('/add_todo')}}',
                'method':'POST',
                'data':todoData,
                'success':function(data,status){
                    if(status == 'success'){
                          //console.log(data);
                          
                          
                          $('#addTodoModal').modal('hide');
                          location.reload();
                          $('#info').html(`<div class='alert alert-success'>Your data has <strong>Insert Successfully</strong>.</div>`);




                    }
                },
                'error': (error)=>{
                    if(error) throw error;
                }
              });


         }
                       

                   
                            


                        


    </script>

<div id="info"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-footer">
                    <div class="row">
                    <div class="col-md-10 ">
                        <h5 class="basic_font">Item data :</h5>
                    </div> 
                    <div class="col-md-2 flex-end">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTodoModal" >Insert</button>
                    </div>
                    </div>
                </div>
                <div class="card-body ">
                    <table class="table table-striped table-responsive">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>descripton</th>
                                <th>created</th>
                                
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($all_data)
                            @foreach($all_data as $data)
                            <tr id="select_row{{$data->id}}">
                                
                                <td>{{$data->id}}
                                    <input type="hidden" class="tskid" value={{$data->id}}>
                                </td>
                                <td>{{$data->title}}</td>
                                <td>{{$data->descripton}}</td>
                                <td>{{$data->created}}</td>
                                
                                <td>
                                    <button onclick="edit({{$data->id}})" class="btn btn-success">Edit</button>
                                    <button onclick="delete_data({{$data->id}})" class="btn btn-danger">Delete</button>
                                    
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    <div id="info"></div>

     <!--Adding a BS-4 Modal Add Window -->
<div class="modal" tabindex="-1" id="addTodoModal" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Todo:</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Id:</label>
                <input type="text" id="item_id" required class="form-control">
             </div>
           <div class="form-group">
              <label>Title:</label>
              <input type="text" id="titleText" required class="form-control">
           </div>
           <div class="form-group">
              <label>Description :</label>
              <textarea  id="descText" cols="30" rows="10" required class="form-control"></textarea>
           </div>
           <div class="form-group">
              <button type="button" onclick="addTodo()" class="btn btn-sm btn-outline-warning">Add</button>
           </div>
        </div>
       
      </div>
    </div>
  </div>


</body>
</html>