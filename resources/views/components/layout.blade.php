<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--    fonts--}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,700;0,900;1,500;1,600&display=swap" rel="stylesheet">
    {{--    fonts--}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Social Media App</title>
</head>
<body class="font-poppins">
    <x-navbar  />
    <main class="w-[90vw] sm:w-[80%] md:w-[50%] mt-4 mx-auto">
        {{$slot}}
    </main>
</body>
</html>
