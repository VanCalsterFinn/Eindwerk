<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <div class="loginContainer">
        <div class="loginFormContainer">
            <h1>Login</h1>
            <label for="username">
                <p>Username</p>
                <input type="text" placeholder="">
                {{-- <small>Fill in your username!</small>
                <small>The minimum length of a username is 5 chars!</small>
                <small>There cannot be whitespaces!</small> --}}
            </label>
            <label for="password">
                <p>Password</p>
                <input type="password" placeholder="">
                {{-- <small>Fill in your password!</small> --}}
            </label>
            {{-- <div class="error">
                <p>Invalid credentials!</p>
            </div> --}}
            <div class="buttonContainer">
                <input type="submit" value="Login" id="loginButton">
            </div>
            <div class="registerContainer">
                <p>Don't have an account? <a>Register here</a> </p>
            </div>
        </div>
    </div>
</body>
</html>