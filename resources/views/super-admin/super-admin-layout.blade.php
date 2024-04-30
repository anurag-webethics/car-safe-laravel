<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/Group 46.png') }}" type="image/x-icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg nav bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/"><img src="{{ asset('images/logo.png') }}" class="nav-logo"
                    alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-primary menu"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 justify-content-center  mb-lg-0">
                    <li class="nav-item fs-5 fw-medium">
                        <a class="nav-link text-light" href="/">Home</a>
                    </li>
                    <li class="nav-item fs-5 fw-medium">
                        <a class="nav-link text-light" href="#">About Us</a>
                    </li>
                </ul>
                <div class="button-group d-flex gap-2">

                    @if (empty(Auth::user()))
                        <a href="{{ route('login') }}" class="link-light link-offset-2 link-underline-opacity-0"><button
                                type="button" class="btn rounded-0 text-white login nav-btn">Login</button></a>
                        <a href="{{ route('registration') }}"
                            class="link-light link-offset-2 link-underline-opacity-0"><button type="button"
                                class="btn rounded-0 text-white sign nav-btn">Signup</button></a>
                    @else
                        <a href="{{ route('profile') }}"
                            class="link-light link-offset-2 link-underline-opacity-0"><button type="button"
                                class="btn rounded-0 text-white profile nav-btn"><i class="fa-solid fa-user"
                                    style="color: #ffffff;"></i> Profile</button></a>
                        <a href="{{ route('logout') }}"
                            class="link-light link-offset-2 link-underline-opacity-0"><button type="button"
                                class="btn rounded-0 text-white login nav-btn">Logout</button></a>
                    @endif
                </div>
            </div>

        </div>
    </nav>

    <div class="d-flex">
        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark " style="width: 280px;height:89vh">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap"></use>
                </svg>
                <span class="fs-4">Super Admin</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="{{ route('role') }}" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home"></use>
                        </svg>
                        Roles
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2"></use>
                        </svg>
                        Assigns Role
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#table"></use>
                        </svg>
                        Manage User
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" style="">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div class="container-fluid">
            @yield('super-admin')
        </div>

    </div>



</body>

</html>
