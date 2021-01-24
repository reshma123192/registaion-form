<?php include ('server.php')?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registration</title>
</head>
<body>

<div class="container">
    <div class="header">
        <h2>Registration</h2>
    </div>
<form action="registration.php" method="post">
    <?php include ('error.php')?>

    <div>
        <lable for="username">Username:</lable>
        <input type="text" name="username" Required>
   </div>   
   <div>
        <lable for="email">Email:</lable>
        <input type="email" name="email" Required>
   </div>   
   <div>
        <lable for="password">Password:</lable>
        <input type="password" name="password_1">
   </div>   
   <div>
        <lable for="password">Confirm Password:</lable>
        <input type="password" name="password_2">
   </div>   
   <button type="submit">Submit</button>
   <p><a href="login.php">Already a user</a></p>
</form>
</div>
</body>
</html>




















</body>

