<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
     if(isset($users))
     { //$email=$users;
        //print_r($users);
        //echo $email."<br>";
       // foreach($users as $user)
        //{
        echo ("<div class='alert alert-primary'>Your Email id is:-<strong>".$users."</strong></div>");
        //}   
     } 
     ?>
     <a href="/login_form"><button class="btn btn-primary">Logout</button></a>
</body>
</html>