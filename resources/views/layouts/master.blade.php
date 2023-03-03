<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title','Job Portal')</title>
    <link rel="icon" type="image/png" href="frontend/assets/img/favicon.png">
    
    <!-- Style  -->
    @include('layouts.partials.style')

</head>

<body>

    <!-- Loader  -->
    @include('layouts.partials.header')

    <!-- Navbar  -->
    @include('layouts.partials.navbar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @include('layouts.partials.footer')

    <!-- Script -->
    @include('layouts.partials.script')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    @include('sweetalert::alert')

</body>

</html>
