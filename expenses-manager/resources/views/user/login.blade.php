<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <h1>Login</h1>
    @if ($errors->has('email'))
    <span class="error">{{ $errors->first('email') }}</span>
@endif

    <form method="POST" action="{{ route('processLogin') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>
        </div>

        <div>
            <button type="submit">Login</button>
            
        </div>
    </form>
    <div>
        <a href="{{ route('signup') }}">Sign Up</a>
    </div>
</body>

</html>
<div>
    {{-- <a href="{{ route('register') }}">Sign Up</a> --}}
</div>
