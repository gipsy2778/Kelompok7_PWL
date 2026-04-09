(views/layouts/app.blade.php)

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

<div class="flex h-screen">

    <!-- Sidebar -->
    @include('layouts.sidebar')

    <!-- Main -->
    <div class="flex-1 flex flex-col">

        <!-- Navbar -->
        @include('layouts.navbar')

        <!-- Content -->
        <div class="p-6 flex-1">
            @yield('content')
        </div>

        <!-- Footer -->
        @include('layouts.footer')

    </div>

</div>

</body>
</html>