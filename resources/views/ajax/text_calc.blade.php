<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#t1').keyup(function(e){
                var txt=$(this).val();
                if(txt.length>=3)
                {
                    console.log("Ajax calling...");
                    $.ajax({
                        'url':"{{url('/submit')}}",
                        'method':'POST',
                        'data':{
                            '_token':"{{csrf_token()}}",
                            'param1':$('#t1').val(),
                        },
                        'success':function(data,status)
                        {
                            if(status=='success')
                            $('#d1').html(data);
                        },
                        'error':function(error){
                            console.log(error);
                        }
                    });
                }
            })
        });
    </script>
</head>
<body>
    <header>
        <h1>Text Length calculation in Ajax : Laraval</h1>

    </header>
    Type Something : <input type="text" id="t1">
    <div id="d1">

    </div>
</body>
</html>