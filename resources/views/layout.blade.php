<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Afrinets</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="/CSS/style.css">
    {{-- <link rel="stylesheet" href="./css/app.css"> --}}
</head>
<body>
    <div class="container">
 
        {{-- topbar -> nav --}}
        <div class="topbar">
            <h1 class="intro">
               Introducing  Afrinets
            </h1>
            <p>Learn more</p>
        </div>
        {{-- end of topbar --}}

      
        @yield('content')
        <x-flash-message />
    </div>
    <script src="/JS/app.js"></script>
</body>
</html>