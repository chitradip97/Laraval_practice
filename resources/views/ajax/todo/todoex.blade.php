

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        var todo_id=0;
        $(document).ready(()=>{
            console.log('jQuery Loaded');
            
        });
        function onLoad(){
            $.ajax({
                'url':"{{url('/todos')}}",
                'method':'get',
                'data':{},
                'success':(data,status)=>{
                     if(status =='success'){
                        $('#result').html(`
                         <p><img src='{{asset('./images/ajax-loader.gif')}}' height='120px' width='120px'/> Please Wait ... </p>`);                        
                        setTimeout(function(){
                            $('#result').html('');
                            console.log(data);  //response coming from ajax
                           var content =`
                            <table class='table table-hover table-bordered'>
                            <tr>
                            <th>Title:</th>
                            <th>Description:</th>
                            <th>Created:</th>
                            <th>Action :</th>
                            </tr>
                           `;
                           var jsonData = data;
                           jsonData.forEach(function(obj){
                              content+=`
                               <tr>
                                   <td>${obj.title}</td>
                                   <td>${obj.description}</td>
                                   <td>${obj.created}</td>
                                   <td><button class='btn btn-sm btn-outline-primary' onclick='deleteTodo(${obj.id})'>Delete</button>||
                                <a href="#" data-target="#editTodoModal" data-toggle="modal" class="btn btn-sm btn-outline-success" onclick="editTodo(${obj.id})">Edit</a>

                                   </td>
                               </tr>
                              `;
                           });
                           content+='</table>';
                           //console.log(content);
                           $('#result').html(content);
                          


                        },3000);
                        
                     }
                },
                'error' :(error)=>{
                    if(error) throw error;
                }
            });
        }

        function addTodo(){
              var todoData = {
                  'title': $('#titleText').val(),
                  'description' : $('#descText').val(),
                  '_token':'{{csrf_token()}}'
              };


              console.log(todoData);
              $.ajax({
                'url':'{{url('/todo')}}',
                'method':'POST',
                'data':todoData,
                'success': (data,status)=>{
                    if(status == 'success'){
                          console.log(data);
                          alert(data.message);
                          onLoad();
                          $('#addTodoModal').modal('hide');


                    }
                },
                'error': (error)=>{
                    if(error) throw error;
                }
              });


         }


function deleteTodo(id){
            var r = confirm('Do You want to Delete This Record ?');
            
            console.log(id);
            if(r){
            $.ajax({
                'url':`{{url('/todo')}}/${id}`,
                'method':"DELETE",
                'data':{'_token':'{{csrf_token()}}'},
                'success':(data,status)=>{
                    if(status =='success')
                      console.log(data);
                      
                      alert(data.message);
                      onLoad();
                },
                'error':(error)=>{
                    if(error) throw error;
                }
            });
        }
        
         }

         function editTodo(id){
          console.log(id);
          $.ajax({
            'url':`{{url('/todo')}}/${id}`,
            'method':'GET',
            'data':{},
            'success': (data,status)=>{
                if(status =='success'){
                  console.log(data);
                  var jsonData = data;
                  $('#titleEditText').val(jsonData.title);
                  $('#descEditText').val(jsonData.description);
                  todo_id = jsonData.id;
                }
            },3
            'error':(error)=>{}
          });
         }


         function updateTodo(){
            $.ajax({
                 'url':`{{url('/todo')}}/${todo_id}`,
                 'method':'PUT',
                 'data':{
                  '_token'     :`{{csrf_token()}}`,
                  'editTitle'  : $('#titleEditText').val(),
                  'editDesc'   : $('#descEditText').val()
                 },
                 'success': (data,status)=>{
                     if(status =='success'){
                         if(data.message =='success'){
                          alert('One todo has been updated successfully !');
                         
                          $('#editTodoModal').modal('hide');
                          onLoad();
                        }else{
                           alert('Something went wrong !');
                         }
                     }
                      //  console.log(data);
                 },
                 'error'  : (error)=>{
                  if(error) throw error;
                 }


            });
         }

     
        //live search method

         function searchTodo(term){
               if(term.length>=3){
                 $.ajax({
                    'url':`{{url('todo/search')}}`,
                    'method':'POST',
                    'data':{
                      '_token':'{{csrf_token()}}',
                      'pqr': term
                    },
                    'success':(data,status)=>{
                      if(status =='success'){
                        //console.log(data);
                        var todoData = data;


                        var content =`
                            <table class='table table-hover table-bordered'>
                            <tr>
                            <th>#</th>
                            <th>Title:</th>
                            <th>Description:</th>
                            <th>Created:</th>
                            </tr>
                           `;
                           
                           todoData.forEach(function(obj){
                              content+=`
                               <tr>
                                <td><a href="#" class='btn btn-sm btn-outline-danger' onclick="deleteTodo(${obj.id})">Delete</a> |
                                <a href="#" data-target="#editTodoModal" data-toggle="modal" class="btn btn-sm btn-outline-success" onclick="editTodo(${obj.id})">Edit</a>
                                   
                                   </td>
                                   <td>${obj.title}</td>
                                   <td>${obj.description}</td>
                                   <td>${obj.created}</td>
                               </tr>
                              `;
                           });
                           content+='</table>';
                           //console.log(content);
                           $('#result').html(content);
                        
                      }
                      
                    },
                    'error':(error)=>{
                      if(error) throw error;
                    }
                 });
               }
         }


    </script>
    <title>Document</title>
</head>
<body>
  <div class="container-fluid">
  <header class="modal-header">
  <h1>Displaying all Todos :</h1>
  
  </header>

    <!--Adding a TextField -->
    <div class="form-group">
      <input type="text" class="form-control" onkeyup="searchTodo(this.value)" placeholder="Search title">

    </div>
  
    <button class="btn btn-sm btn-outline-primary" onclick="onLoad()">Load Todos:</button>
    <button class="btn btn-sm btn-outline-info" data-target="#addTodoModal" data-toggle="modal">Add Todo</button>

    <div id="result" class="table-responsive">
        <!--Ajax will update this content with out reloading the entire Page-->
    </div>
  </div>
     
  <!--Adding a BS-4 Modal Add Window -->
<div class="modal" tabindex="-1" id="addTodoModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Todo:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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

<!--Adding a BS-4 Modal Edit Window -->
<div class="modal" tabindex="-1" id="editTodoModal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Todo:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="form-group">
            <label>Title:</label>
            <input type="text" id="titleEditText" required class="form-control">
         </div>
         <div class="form-group">
            <label>Description :</label>
            <textarea  id="descEditText" cols="30" rows="10" required class="form-control"></textarea>
         </div>
         <div class="form-group">
            <button type="button" onclick="updateTodo()" class="btn btn-sm btn-outline-warning">Edit</button>
         </div>
      </div>
     
    </div>
  </div>
</div>





</body>
</html>
