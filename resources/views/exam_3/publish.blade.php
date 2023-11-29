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
    <script>
        function loadData(){
            $.ajax({
                'url':"{{url('/publisher_info')}}",
                'method':'get',
                'data':{},
                'success':(data,status)=>{
                     if(status =='success'){
                         
                             
                             console.log(data);  //response coming from ajax
                            var content =`
                             <table class='table table-hover table-bordered'>
                             <tr>
                             <th>Pub_code:</th>
                             <th>Pub_name:</th>
                             <th>Pub_Address:</th>
                             <th>Pub_cost :</th>
                             </tr>
                            `;
                            var jsonData = data;
                            jsonData.forEach(function(obj){
                               content+=`
                                <tr>
                                    <td>${obj.Pub_code}</td>
                                    <td>${obj.Pub_name}</td>
                                    <td>${obj.Pub_Address}</td>
                                    <td>${obj.Pub_cost}</td>
                                    
                                </tr>
                               `;
                            });
                            content+='</table>';
                            //console.log(content);
                            $('#result').html(content);
                           
 
 
                         
                         
                      }
                 },
                 'error' :(error)=>{
                     if(error) throw error;
                 }
             });
         }
     </script>
                                                

    <button onclick="loadData()">load Publisher data</button>
    <div id="result"> </div>
</body>
</html>