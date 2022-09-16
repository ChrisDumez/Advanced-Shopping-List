<h2>User Login</h2>

<form action="/user-login" method="post">
    @csrf
    <p>
        <input type='email' name='email' placeholder='email'/>
    </p>
    <p>
        <input type='password' name='password' placeholder='password'/>
    </p>
    <p>
        <button type='submit'>Login User</button>
    </p>
</form>


<a href="{{ url('user-registration') }}">Register</a>
                    