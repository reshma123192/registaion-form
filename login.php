<?php include (server.php)?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <h2>Login</h2>
            </div>
            <form action="login.php" method="post">
            <div>
                <lable for="username">Username:</lable>
                <input type="text" name="username" Required>
            </div>    
            <div>
                <lable for="password">Password:</lable>
                <input type="password" name="password_1" Required>
            </div>    
            <button type="submit" name="login_user">Log In</button>

            <p>Not a user?<a href="registration.php"><b>Register here</b></a></p>
</form>
</div>
</body>
</head>



