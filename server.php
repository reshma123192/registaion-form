<?php
session_start();

//intializing variables
$username = "";
$email = "";
$errors = array();

//connection to db
$db = mysqli_connect('localhost', 'root', '', 'practise') or die("could not connect to database");

//register users
$username = mysqli_real_escape_string($db, $_POST['username']);
$email = mysqli_real_escape_string($db, $_POST['email']);
$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

//form validiation
if(empty($username))
{
    array_push($errors, "Username is Required");
}
if (empty($email))
{
    array_push($errors, "Email is Required");
}
if(empty($password_1))
{
    array_push($errors, "Password is Required");
}
if($password_1 !== $password_2 )
{
    array_push($errors, "Password do not match");
}
//check db for existing user with same username
$user_check_query = "SELECT * from user where username='$username' or email='$email' LIMIT 1";
$results = mysqli_query($db, $user_check_query);
$user = mysqli_fetch_assoc($results);

if($user['username'] === $username)
{
    array_push($errors, "Username Already Exist");
}
if($user['email'] === $email)
{
    array_push($errors, "The email already has a registered username");
}

//register the user if no error
if(count($errors) == 0)
{
    $password = md5($password_1); //encrypt the password
    $query = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "you are now loged in";
    header('location: index.php');
}

//login user
if(isset($_POST['login_user']))
{
    $username = mysqli_real_escape_string($db, $_POST[username]);
    $password = mysqli_real_escape_string($db, $_POST[password]);
    if(empty($username))
    {
        array_push($errors, "username is required");
    }
    if(empty($password))
    {
        array_push($errors, "password is required");
    }
    if(count($errors) == 0)
    {
        $password = md5 ($password);
        $query = "SELECT * FROM user WHERE username ='$username' AND password = '$password'";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($results))
        {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "logged in successfully";
            header('location : index.php');
        }
        else
        {
            array_push($errors, "Wrong username or password in combination again");

        }
    }


}
?>
