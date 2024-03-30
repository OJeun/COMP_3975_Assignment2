<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
    <link href="{{ asset('/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            display: flex;
            flex-direction: column;
            width: 300px;
            padding: 20px;
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
        <h1>Sign Up</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('processSignup') }}">
            @csrf
            <div>
                <label for="email">Email:</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
            </div>

            <div>
                <label for="password">Password:</label>
                <input id="password" type="password" name="password" required autocomplete="new-password">
            </div>

            <div>
                <button type="submit">Sign Up</button>
            </div>
        </form>
        <div>
            <a href="{{ route('login') }}">Log In</a>
        </div>
    </div>
</body>

</html>
