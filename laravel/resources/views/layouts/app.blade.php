<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>

<body>
    <div class="w-full h-14">
        @include('components.navbar')
    </div>
    @if (Session::has('success'))
        <div id="success-msg" class="text-sm bg-green-200 py-2 px-3 w-full">
            {{ Session::get('success') }}
        </div>
        <script>
            setTimeout(()=>{
                document.getElementById('success-msg').style.display = 'none';
            }, 3000);
        </script>
    @endif
    <div class="flex justify-center px-2 md:px-5 xl:px-10 py-10">
        @yield('content')
    </div>
</body>

</html>
