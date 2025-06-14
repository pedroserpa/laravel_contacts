
<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Laravel blog.">
    <meta name="author" content="Pedro Serpa">
    <meta name="generator" content="Pedro 2023">
        <title>App Name - @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet">
        @yield('styles')
    </head>
    <body>
        @section('header')
        <div class="container">
            <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a title="Home" href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
                <span class="fs-4">ContactAPP</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link {{ (Route::currentRouteName() === 'app_home') ? 'active' : '' }}" aria-current="page">Home</a></li>
                @guest
                    <li class="nav-item"><a href="{{ route('app_login') }}" class="nav-link  {{ (Route::currentRouteName() === 'app_login') ? 'active' : '' }}">Login</a></li>
                @endguest
                <li class="nav-item"><a href="{{ route('app_register') }}" class="nav-link  {{ (Route::currentRouteName() === 'app_register') ? 'active' : '' }}">Register</a></li>

                @auth
                    <li class="nav-item"><a href="{{ route('app_logout') }}" class="nav-link">Logout</a></li>
                    <li class="nav-item"><a href="{{ route('app_contact_create') }}" class="nav-link  {{ (Route::currentRouteName() === 'app_contact_create') ? 'active' : '' }}">Add Contact</a></li>
                @endauth
            </ul>
            </header>
        </div>
        @show

        @section('sidebar')
        
        @show
 
        <main class="container">
            @yield('content')
        </main>

        @section('footer')
        <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
            <a href="/" class="mb-3 me-2 mb-md-0 text-body-secondary text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
            </a>
            <span class="mb-3 mb-md-0 text-body-secondary">© <?php echo date('Y');?> Company, Inc</span>
            </div>

            <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"></use></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"></use></svg></a></li>
            <li class="ms-3"><a class="text-body-secondary" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"></use></svg></a></li>
            </ul>
        </footer>
        </div>
        @show
        <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        @yield('scripts')
    </body>
</html>