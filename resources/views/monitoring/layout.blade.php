<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LVDP | Monitoring</title>
    @include('monitoring.head')
</head>

<body>
    @include('monitoring.header')
    @yield('content')
    @include('monitoring.script')
</body>

</html>