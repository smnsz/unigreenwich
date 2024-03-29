<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Backend</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ URL::asset('/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Bootstrap core JS -->
        <script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
        <!-- jQuery core JS -->
        <script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
        <!-- Custom styles for this template -->
        <link href="{{ URL::asset('/css/style.css') }}" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>
