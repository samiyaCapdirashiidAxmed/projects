<?php

include("conection.php");

$message = "";

if(isset($_POST["login_btn"])){

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    $sql = "SELECT username, fullname, password FROM registration1 WHERE username=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_assoc($result);

        
        if(trim($password) === trim($row["password"])){

    session_start();
    $_SESSION["username"] = $row["username"];
    $_SESSION["fullname"] = $row["fullname"];



     header("Location: dhashpood.php");
    exit();
}else{

    $message = "Incorrect Password!";

}

        }else{

            $message = "Incorrect Password!";

        }

    }else{

        $message = "Username not found!";

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login Page</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
body{
    font-family:Arial,sans-serif;
    background:#000080;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
    margin:0;
}
.main-container{
    display:flex;
    width:700px;
    background:#fff;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 15px 35px rgba(0,0,0,.3);
}
.welcome-side{
    flex:1;
    background:linear-gradient(135deg,#6a11cb,#2575fc);
    color:#fff;
    padding:40px;
    text-align:center;
    display:flex;
    flex-direction:column;
    justify-content:center;
}
.login-side{
    flex:1;
    padding:40px;
}
.logo{
    width:80px;
}
input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:8px;
}
.submit-btn{
    width:100%;
    padding:12px;
    background:#3c39d1;
    color:#fff;
    border:none;
    border-radius:8px;
    cursor:pointer;
}
.submit-btn:hover{
    background:#2575fc;
}
.forgot-password{
    text-align:right;
    margin:10px 0;
}
.forgot-password a{
    text-decoration:none;
    color:#3c39d1;
}
.message{
    color:red;
    text-align:center;
    margin-bottom:10px;
}
</style>

</head>
<body>

<div class="main-container">

<div class="welcome-side">
<h1>Welcome Back!</h1>
<p>Please enter your credentials to access your account.</p>
</div>

<div class="login-side">

<center>
<img src="logo.png" class="logo">
<h2>Login</h2>
</center>

<?php
if($message!=""){
    echo "<div class='message'>$message</div>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Enter Username" required>

<input type="password" name="password" placeholder="Enter Password" required>

<div class="forgot-password">
<a href="forgot_password.php">Forgot Password?</a>
</div>

<button type="submit" name="login_btn" class="submit-btn">
LOGIN
</button>

</form>

<br>

<center>
<a href="paint.php">Need an account? Register</a>
</center>

</div>

</div>

</body>
</html>