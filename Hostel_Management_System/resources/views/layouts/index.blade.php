<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Admin Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #7062B9;
        }

        .cta-btn {
            color: #7062B9;
        }

        .upgrade-btn {
            background: #7062B9;
        }

        .upgrade-btn:hover {
            background: #7062B9;
        }

        .active-nav-link {
            background: #968DC8;
        }

        .nav-item:hover {
            background: #968DC8;
        }

        .account-link:hover {
            background: #968DC8;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    @include('layouts.aside')

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        
        @include('layouts.navbar')

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                @yield('content')
            </main>

            @include('layouts.footer')
        </div>

    </div>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

</body>

</html>
