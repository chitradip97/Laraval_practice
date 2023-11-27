<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <script>
        function addUser(){
            var signUpData={
                '_token':`{{csrf_token()}}`,
                'name':$('#t1').val(),
                'phone':$('#t3').val(),
                'email':$('#p1').val()
            };
            $.ajax({
                'url':{{url('/user/add')}},
                'data':signUpData,
                'method':'post',
                'success':function(data,status)
                {
                    if(status=='success')
                    {
                        console.log(data);
                        if(data.message=='success')
                        {
                            alert('you have successfully Registerd with US');
                            $('#t1,#t2,#t3,#p1').val('');
                            ducument.getElementById('t1').focus();
                        }
                    }
                }
                'error':function(error){
                    if(error) throw error;
                }
            });
        }

    </script> 

    <div>
        <h3>sign up</h3>
        <table>
            <tr>
                <td>Name:</td>
                <td><input type="text" name="t1" id="t1" ></td>
            </tr>
            <tr>
                <td>Phone:</td>
                <td><input type="number" name="t2" id="t2" ></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="t3" id="t3" ></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="p1" id="p1" ></td>
            </tr>
            <tr>
                <button onclick="addUser()">SignUp</button>
            </tr>
        </table>
    </div>

    <div>
        <h3>sign in</h3>
        <table>
            
            
            <tr>
                <td>Email:</td>
                <td><input type="text" name="uname" id="umane" ></td>
            </tr>
            <tr>
                <td>Password:</td>
                <td><input type="text" name="pw1" id="pw1" ></td>
            </tr>
            <tr>
                <button onclick="signIn()">Login</button>
            </tr>
        </table>
    </div>
</body>
</html>