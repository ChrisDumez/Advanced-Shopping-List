<h2>User Registration</h2>

<form acton="{{url('/user-registration')}}" method='post'>
    @csrf
    <p>
        <input type='text' name='username' placeholder='username'/>
    </p>
    <p>
        <input type='email' name='email' placeholder='email'/>
    </p>
    <p>
        <input type='password' name='password' placeholder='password'/>
    </p>
    <p>
        <input type='password' name='password_confirmation' placeholder='confirm password'/>

    </p>
    <p>
        <input type='submit' value='Register'/>
    </p>
</form>

@if ($errors->any())
    <div style="border: solid 1px red;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<a href="{{ url('/') }}">Login</a>