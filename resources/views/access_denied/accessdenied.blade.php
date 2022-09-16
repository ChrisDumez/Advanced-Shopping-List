<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Unauthentacated User - Advanced Shopping List</title>
    <link rel="stylesheet" href="{{ URL::asset('access_denied/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Akronim&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Alfa+Slab+One&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Amita&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL::asset('access_denied/css/Login-Form-Basic-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('access_denied/css/login-form-styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('access_denied/css/login-form.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('access_denied/css/styles.css') }}">
</head>

<body style="background: rgb(0,0,0);">
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 style="font-family: Aclonica, sans-serif;color: rgb(255,255,255);">ADVANCED SHOPPING LIST</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col" style="align-items: center;">
                    <h1 style="text-align: center;background: #000000;color: rgb(255,15,0);">Unauthenticated User</h1>
                    <a href="{{ url('/') }}"><p style="color: rgb(0,231,23);text-align: center;font-size: 26px;">Return to Main Screen</p></a>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ URL::asset('access_denied/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>