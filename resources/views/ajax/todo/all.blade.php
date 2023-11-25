<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    
</head>
<body>
    <script>
        
        function onLoad(){
            console.log("hello");
            $.ajax({
                'url':"{{url('/fetchall')}}",
                'method':'get',
                'data':{},
                'success':function(data,status){
                    if(status=="success")
                    {
                        console.log(data);
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
                            $('#result').html(output);

                    }
                },
                'error':function (error){
                    if(error) throw error;
                }
            });
        }

    </script>
    <button class="btn btn-sm btn-outline-primary" onclick="onLoad()">Load Todo:</button>
    <div id="result" class="table-responsive">

    </div>
</body>
</html>