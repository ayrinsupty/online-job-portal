<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Job Portal')</title>
    <link rel="icon" type="image/png" href="frontend/assets/img/favicon.png">

    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Style  -->
    @include('layouts.partials.style')
</head>

<body>

    <!-- Header  -->
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
