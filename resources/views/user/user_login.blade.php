<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login - Advanced Shopping List</title>
    <link rel="stylesheet" href="{{ URL::asset('user_login/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Akronim&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Alfa+Slab+One&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Amita&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL::asset('user_login/css/Login-Form-Basic-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user_login/css/login-form-styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user_login/css/login-form.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('user_login/css/styles.css') }}">
</head>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 style="font-family: Aclonica, sans-serif;">ADVANCED SHOPPING LIST</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <form class="text-center" style="width: 300px;" method="post" action="{{ URL('/user-login') }}">
                            @csrf
                                <div class="mb-3"><input class="form-control" type="text" name="username" placeholder="Username"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">Login</button></div>
                                <!--<a href="{{ url('user-registration') }}" style="text-decoration: none;"><p class="text-muted">Register</p></a>-->

                                <div class="mb-3"><p class="d-block w-100">Username: ADMIN</p></div>
                                <div class="mb-3"><p class="d-block w-100">Password: admin</p></div>

                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                             @endforeach
                                        </ul>
                                    </div>
                                @endif
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ URL::asset('user_login/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>