<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
        <div class="jumbotron">
            <div class="content">
                <div class="title m-b-md">
                    Doctors<span class="badge badge-primary">{{$doctors->total()}}</span>
                </div>
                <div class="links">
                    @foreach($doctors as $doctor)
                    <div>
                        <a href="doctor/{{$doctor->id}}">
                            <span>{{$doctor->surname}}</span>
                            <span>{{$doctor->name}}</span>
                            <span>{{$doctor->patronymic}}</span>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $doctors->links() }}
    </body>
</html>
