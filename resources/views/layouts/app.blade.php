<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
    <title>ProLog - The Beginning of Simple Project Management</title>

    <!-- CSS  -->
    {{--<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">--}}
    <link href="/materialize/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/datatables/datatables.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>

@include('layouts.nav')

<main>
    @yield('content')
</main>

@include('layouts.footer')

<!--  Scripts-->
<script src="/jquery/jquery.min.js"></script>
<script src="/datatables/datatables.js"></script>
<script src="/tinymce/tinymce.min.js"></script>
<script src="/materialize/materialize.min.js"></script>
<script src="/materialize/init.js"></script>
<script src="/js/index.js"></script>

</body>
</html>
