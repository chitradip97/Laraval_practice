<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        function findInfo()
        {
            console.log("hello");
            let tid=$('#taskid').val();
            $.ajax({
                'url':"{{url('/findinfo')}}",
                'method':'post',
                'data':{
                    '_token':{{csrf_token()}},
                    'tskid':tid
                },
                'success':function(data,status){
                    if(status=="success")
                    {
                        console.log(data);
                        if(data.active==1)
                        {
                            var output=`<table class='table table-hover table-bordered'>
                         <tr>
                          <td>ID</td>
                          <td>TITLE</td>
                          <td>DESCRIPTION</td>
                          </tr>    
                            `;
                            var temp=data.map((val)=>{ 
                                return `<tr>
                                
                          <td>${val.id}</td>
                          <td>${val.title}</td>
                          <td>${val.descripton}</td>
                          </tr>`;
                                
                            })
                            output=output+temp.join('')+"</table>";
                            $('#info').html(output);
                        }
                        else{
                            $('#info').html('<h3>Task Id is Wrong</h3>');
                        }
                       

                    }
                },
                'error':function (error){
                    console.log(error);
                }
            });
        }

    </script>

</head>
<body>
    <h3>Search By Id :</h3>
    Enter ID :
    <input type="number" id="taskid"/>
    <br>
    <button onclick="findInfo()">SEARCH</button>
    <div id="info">

    </div>
</body>
</html>