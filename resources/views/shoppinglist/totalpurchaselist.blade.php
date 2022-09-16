<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Collection - Advanced Shopping List</title>
    <link rel="stylesheet" href="{{ URL::asset('dashboard/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Aclonica&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Akronim&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Alfa+Slab+One&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL('https://fonts.googleapis.com/css?family=Amita&amp;display=swap') }}">
    <link rel="stylesheet" href="{{ URL::asset('dashboard/css/Login-Form-Basic-icons.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dashboard/css/login-form-styles.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dashboard/css/login-form.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('dashboard/css/styles.css') }}">
</head>

<body>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col">
                    <div class="btn-group" role="group" style="font-size: 2px;height: 19px;margin-top: -34px;padding-top: 0px;margin-bottom: 2px;">
                        <a href="{{ url('/logout') }}">    
                            <button class="btn btn-danger" type="button" style="font-size: 10px;border-top-right-radius: 4px;border-bottom-right-radius: 4px;padding-top: 5px;">Logout</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto" style="margin-top:-48px">
                    <h2 style="font-family: Aclonica, sans-serif;">ADVANCED SHOPPING LIST</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="margin-left: -205px;margin-bottom: 0px;background: rgb(50,52,55);"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <p style=";margin-top: -79px;margin-bottom: 56px;"><b>{{$username}}</b></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">

                <!--Collection table-->
                <div class="col-md-6 col-xl-4" style="width: 629px;">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center" >
                            <h1 style="font-size: 27.88px;font-family: Amita, serif;--bs-body-font-weight: normal;--bs-body-font-size: -3rem;">Collection Total: R{{$total_price}}</h1>
                            <div class="table-responsive" style="width: 100%;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="font-size: 14px;">Item</th>
                                            <th style="font-size: 14px;">Qty</th>
                                            <th style="font-size: 14px;">Category</th>
                                            <th style="font-size: 14px;">Price</th>
                                            <th style="font-size: 14px;">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($table_PurchasedItems as $data)
                                        <tr>
                                            <td style="font-size: 14px;">{{$data->item}}</td>
                                            <td style="font-size: 14px;">{{$data->quantity}}</td>
                                            <td style="font-size: 14px;">{{$data->category}}</td>
                                            <td style="font-size: 14px;">{{$data->price}}</td>
                                            <td><a class="btn btn-danger" style="font-size: 10px;" href="{{ url('/delete-purchaseitem/'.$data->id) }}">Remove</a>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <a href="{{ url('/items-dashboard') }}"><button class="btn btn-primary" style="font-size: 12px; margin-bottom:20px" type="button" >Back to Dashboard</button></a>
                            </div>
                        </div>
                    </div>
                </div>

                

                <a href="{{ url('/delete-purchaseitemdeleteAllView') }}"><button class="btn btn-warning" style="font-size: 12px;" type="button" >Clear Shopping List</button></a>

            </div>
        </div>
    </section>
    <script src="{{ URL::asset('dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>