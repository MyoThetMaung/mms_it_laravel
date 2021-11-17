<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>
<body>

    @php
       $name = 'saimon';
       $age = 24;
       $arr = ['apple','orange','pineapple'];

       $na = "<h2>name is dad </h2>";
    @endphp

    <h2>my name is {{$name}}</h2>

    <p>my fav fruits are {{var_dump($arr)}} </p>

    {!!$na!!}

    @for ($i = 0; $i < 10; $i++)
        The current value is {{ $i }}
        <br>
    @endfor

    @foreach($arr as $a)
        fruits are {{$a}}
        <br>
    @endforeach

    @isset($name)
        <h2>name exits </h2>
    @endisset

    








</body>
</html>