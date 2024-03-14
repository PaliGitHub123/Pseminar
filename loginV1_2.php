<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initialt-scale=1">
    <link rel="stylesheet" type="text/css" href="loginV1_2_layout.css" />
    <title> Login 1.2</title>
</head>

<body>
    <h1>
        Login
    </h1>

    <form action="login_request.php" method="POST">
        <p>Name eingeben</p>
        <input type="text" name ="login_name" class = "textbox"><br>
        <p>Passwort eingeben</p>
        <input type="password" name ="login_pass" class = "textbox"><br>
        <input type="submit" value="Login" class = "submit">
    </form>

</body>

</html>