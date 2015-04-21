<html lang="en">
<head>
    {{-- Common Header Stuff Here --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Hardware Store</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap-theme.min.css" rel="stylesheet">
    {{ HTML::style('css/justified-nav.css'); }}
    {{ HTML::style('css/style-frontend.css'); }}
</head>
<body>
    <div class="container">
        @include('layouts.elements.topnav')
    </div>
    <div class="container">
        @yield('content')
        @include('layouts.elements.footer')
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>