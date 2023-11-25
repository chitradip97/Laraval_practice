<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

    <form method="post" action="{{url('/submit')}}" enctype="multipart/form-data">
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
    EMAIL:
    <input type="email" name="em" value="{{old('em')}}">
    <br>
    Educational Degree:
    <input type="checkbox" name="edu[]" value="B.tech" {{(collect(old('lang'))->contains("B.tech"))?'checked':''}}>B.tech
    <input type="checkbox" name="edu[]" value="MBA" {{(collect(old('lang'))->contains("MBA"))?'checked':''}}>MBA
    <input type="checkbox" name="edu[]" value="M.tech" {{(collect(old('lang'))->contains("M.tech"))?'checked':''}}>M.tech
    <br>
    Upload profile pic:
    <input type="file" name="avatar">
    <br>
    <input type="submit" value="SUBMIT">
    </form>

</body>
</html>