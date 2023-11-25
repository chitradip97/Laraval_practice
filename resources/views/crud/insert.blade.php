<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
</head>
<body>
    <h3>REGISTER FORM</h3>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
            <li style="color:red;">{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form method="post" action="{{url('/submitdata')}}" enctype="multipart/form-data">
        @csrf
        NAME:
        <input type="text" name="nm" value="{{old('nm')}}">
        <br>
        AGE:
        <input type="number" name="ag" value="{{old('ag')}}">
        <br>
        GENDER:
        <input type="radio" name="gen" value="Male" {{old('gen')=="Male"?'checked':''}}>M
        <input type="radio" name="gen" value="Female" {{old('gen')=="Male"?'checked':''}}>F
        <br>
        Language Speek:
        <select name="lang[]" multiple>
        <option value="Bengali" {{(collect(old('lang'))->contains("Bengali"))?'selected':''}}>Bengali</option>
        <option value="English" {{(collect(old('lang'))->contains("English"))?'selected':''}}>Hindi</option>
        <option value="Hindi" {{(collect(old('lang'))->contains("Hindi"))?'selected':''}}>Hindi</option>
        <option value="Tamil" {{(collect(old('lang'))->contains("Tamil"))?'selected':''}}>Tamil</option>
    
        </select>
        <br>
       
        Upload profile pic:
        <input type="file" name="avatar">
        <br>
        <input type="submit" value="SUBMIT">
        </form>
        <br><br>
        @if(isset($info))
        <div style="background-color: lightgreen;width:60%;border:5px solid gray;color:blue">
            <h3>{{$info}}</h3>
        </div>
        @endif
</body>
</html>