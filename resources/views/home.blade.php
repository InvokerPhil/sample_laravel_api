

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth
   <p>You are logged in</p>
    <form action="/logout" method="POST">
       @csrf
        <button>Logout</button>
    </form>
    @else
    <div style="border: 3px solid black;">
        <h1>Register</h1>
        <form action="/register" method="POST">
            @csrf
            <input name="name" type="text"placeholder="name">
            <input name="email" type="text"placeholder="email">
            <input name="password" type="password"placeholder="password">
            <button type="submit">Register</button>
        </form>
    </div>
        <div style="border: 3px solid black;">
        <h1>Login</h1>
        <form action="/login" method="POST">
            @csrf
            <input name="uname" type="text"placeholder="name">
            <input name="pass" type="text"placeholder="password">
           
            <button type="submit">Login</button>
        </form>
    </div>

    @endauth
</body>
</html>