<html lang="en">
<head>
    {{-- Common Header Stuff Here --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome to Administration</title>

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    {{ HTML::script('css/style.css'); }}
</head>
<body>


@if(Auth::check())
    <!-- if logged in then only show -->
    @include('manager.layouts.elements.topnav')
@endif
    <!-- end of if -->

<div class="container">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</body>
</html>