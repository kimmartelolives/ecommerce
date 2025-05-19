<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container">
    <h2>Forgot Your Password?</h2>

    @if (session('status'))
        <div style="color: green;">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <label for="email">Email Address:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <button type="submit">Send Password Reset Link</button>
        </div>
    </form>
</div>



    
</body>
</html>

