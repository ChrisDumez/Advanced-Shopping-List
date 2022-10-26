<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Collect Item - Advanced Shopping List</title>
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
                        <a href="{{ url('/items-list') }}">    
                            <button class="btn btn-dark" type="button" style="font-size: 10px;margin-left: 4px;border-radius: 0px;border-top-left-radius: 4px;border-top-right-radius: 4px;border-bottom-right-radius: 4px;border-bottom-left-radius: 4px;margin-top: 1px;padding-top: 5px;">Collection</button>
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
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="margin-left: -205px;margin-bottom: 0px;background: #000000;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
                                    <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>
                                </svg></div>
                            <p style=";margin-top: -79px;margin-bottom: 56px;"><b>{{$username}}</b></p>
                        </div>
                    </div>
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <h1 style="margin-bottom: 26px;">Collect Item</h1>
                            <form class="text-center" action="{{ url('/purchase-item/'.$item->id) }}" method="post" style="width: 282.333px;">
                            @csrf
                                <div class="mb-3"><input ReadOnly class="form-control" type="text" value="{{$item->category}}" name="category"></div>
                                <div class="mb-3"><input ReadOnly class="form-control" type="text" value="{{$item->item}}" name="item"></div>
                                <div class="mb-3"><input class="form-control" type="number" value="{{$item->quantity}}" name="quantity" placeholder="Quantity" style="width: 108.323px;"></div>
                                <div class="mb-3"><input class="form-control" type="number" value="{{$item->price}}" step="any" name="price" placeholder="Price (R)" style="width: 108.323px;"></div>
                                <div class="mb-3"><button class="btn btn-dark d-block w-100" type="submit">Add Amount</button></div>

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
            <div class="row d-flex justify-content-center">





            </div>
        </div>
    </section>
    <script src="{{ URL::asset('dashboard/bootstrap/js/bootstrap.min.js') }}"></script>
</body>

</html>