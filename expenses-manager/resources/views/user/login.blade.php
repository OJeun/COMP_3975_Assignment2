<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="{{ asset('/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* background-color: #f8f9fa; */
        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            padding: 20px;
            /* border: 1px solid #ced4da; */
            border-radius: 0.25rem;
        }

        form div {
            margin-bottom: 10px;
        }

        button {
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
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
