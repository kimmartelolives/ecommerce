<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <div class="container">
    <h2>Reset Password</h2>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div>
            <label for="password">New Password:</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password-confirm">Confirm New Password:</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>

        <div>
            <button type="submit">Reset Password</button>
        </div>
    </form>
</div>


</body>
</html>

