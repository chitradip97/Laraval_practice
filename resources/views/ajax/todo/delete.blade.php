<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
    <script>
        // document.getElementById ("checkAllTopicCheckBoxes").addEventListener ("click", myFunction, false);
        function delete_todo()
        {
            console.log("hello");
            let tid=$('.uid').val();
            let tname=$('.utitle').val();
            let tdesc=$('.udesc').val();
            $.ajax({
                'url':"{{url('/delete_backend')}}",
                'method':'post',
                'data':{
                    '_token':'{{csrf_token()}}',
                    'uid':tid,
                    'utitle':tname,
                    'udesc':tdesc
                },
                'success':function(data,status){
                    if(status=="success")
                    {
                        console.log(data);
                        $('#info').html(`<h4 style="color:green; font-weight: bold">${data.message}</h4>`);
                    //    if(data.active=1)
                    //    {
                    //     $('#info').html('<h4 style="color:green; font-weight: bold">Your data is successfully deleted.</h4>');
                    //    }
                    //    else if(data.active=0)
                    //    {
                    //     $('#info').html('<h4 style="color:red; font-weight: bold">There is some Error.</h4>');
                    //    }
                    }  
                       

                    // }
                },
                'error':function (error){
                    console.log(error);
                }
            });
        }
    </script>
</head>
<body>
    @if($errors)
    @foreach($errors->all() as $error)
    <li style="color:red;">{{$error}}</li>
    @endforeach
    @endif
    <table>
        {{-- <form action="{{url('/insert_backend')}}" method="POST"> --}}
            {{-- @csrf --}}
           <tr>
            <td>ID :</td>
            <td>
                <input type="text" name="uid" class="uid" >
            </td>
            </tr>
           
            <tr>
                {{-- <td><input type="submit" value="Submit" ></td> --}}
               <td><button onclick="delete_todo()">Submit</button></td> 
            </tr>
            
            
        {{-- </form> --}}
    </table>
    <h4 style="color:green; font-weight: bold" id="info"></h4>
</body>
</html>