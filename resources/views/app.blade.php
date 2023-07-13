<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title inertia>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

<!-- Styles -->
<link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">


<link rel="stylesheet" href="{{ asset('/public/css/dashlite.css?ver=2.2.0') }}">
<link id="skin-default" rel="stylesheet" href="{{ asset('/public/css/theme.css?ver=2.2.0') }}">


{{-- <link rel="stylesheet" href="{{ mix('/css/app.css') }}"> --}}

<!-- Scripts -->
@routes
{{-- <script src="{{ mix('/js/app.js') }}" defer></script> --}}
<script src="{{ asset('/public/js/app.js') }}" defer></script>
<script src="{{ asset('/public/js/bundle.js?ver=2.2.0') }}"></script>
<script src="{{ asset('/public/js/scripts.js?ver=2.2.0') }}"></script>
@inertiaHead

<style>
h1,h2,h3,h4, h5,h6{
font-family: system-ui;
letter-spacing:0.5px;
line-height: 1.5em;
}
p,div, a, .btn{
font-size:15px;
font-family: system-ui;
line-height: 1.5em;

}
.card-header{
background:none;
}

input, .form-control{
padding:20px;
font-size:15px;
min-height:50px;
}
button{
min-height:50px;
font-size:15px;
}

.borders{
border:solid 1.5px #006064;


}
.card .card-header{
background:#006064;
color:white;
}

.card .card-header .card-title{
color:white;
}

</style>
</head>
<body class="nk-body bg-lighter npc-general has-sidebar">
@inertia

</body>
</html>
