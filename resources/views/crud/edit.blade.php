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
    $lang=$user->language;
    $lang=explode(',',$lang);    
    ?>
    <form method="post" action="{{url('/update')}}">
        @csrf
        <header><h4>Edit Info:</h4></header>
        NAME:
        <input type="text" name="editname" value="{{$user->name}}"required>
        <br>
        AGE:
        <input type="number" name="editAge" value="{{$user->age}}" required>
        <br>
        GENDER:
        <input type="radio" name="editgen" value="Male" required {{$user->gender=='Male'?'checked':''}}>M
        <input type="radio" name="editgen" value="Female" required {{$user->gender=='Female'?'checked':''}}>F
        <br>
        Language Speek:
        <select name="lang[]" multiple>
        <option  {{in_array("Bengali",$lang)?'selected':''}}>Bengali</option>
        <option  {{in_array("Hindi",$lang)?'selected':''}}>Hindi</option>
        <option  {{in_array("English",$lang)?'selected':''}}>English</option>
        <option  {{in_array("Tamil",$lang)?'selected':''}}>Tamil</option>
        </select>
    
        <br>
        <input type="hidden" name="hid" value="{{$user->id}}">
       
        <button>Update</button>
    </form>
</body>
</html>