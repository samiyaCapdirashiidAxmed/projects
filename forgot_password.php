<?php
include("conection.php");

$message = "";

if(isset($_POST['reset'])){

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if($new_password != $confirm_password){

        $message = "Passwords do not match!";

    }else{

        // Check if username exists
        $check = mysqli_query($con, "SELECT * FROM registration1 WHERE username='$username'");

        if(mysqli_num_rows($check) > 0){

            // Save password as entered
            $password = $new_password;

            // Update password
            $sql = "UPDATE registration1 SET password='$password' WHERE username='$username'";

            if(mysqli_query($con, $sql)){
                $message = "Password updated successfully.";
            }else{
                $message = "Failed to update password.";
            }

        }else{

            $message = "Username not found!";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Forgot Password</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

body{
    margin:0;
    font-family:Arial, sans-serif;
    background:#000080;
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

.main-container{
    width:700px;
    background:#fff;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.3);
}

.left{
    flex:1;
    background:linear-gradient(135deg,#6a11cb,#2575fc);
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    padding:30px;
    text-align:center;
}

.right{
    flex:1;
    padding:40px;
}

.logo{
    width:80px;
    display:block;
    margin:auto;
}

h2{
    text-align:center;
}

input{
    width:100%;
    padding:12px;
    margin:10px 0;
    border:1px solid #ccc;
    border-radius:8px;
    box-sizing:border-box;
}

button{
    width:100%;
    padding:12px;
    background:#3c39d1;
    color:white;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-size:16px;
}

button:hover{
    background:#2575fc;
}

.message{
    text-align:center;
    color:red;
    margin-bottom:10px;
}

a{
    display:block;
    text-align:center;
    margin-top:15px;
    text-decoration:none;
}

</style>

</head>
<body>

<div class="main-container">

<div class="left">
<h1>Reset Password</h1>
<p>Enter your username and create a new password.</p>

<i class="fas fa-key" style="font-size:80px;"></i>

</div>

<div class="right">

<img src="image1.jpg" class="logo">

<h2>Forgot Password</h2>

<?php
if($message!=""){
    echo "<div class='message'>$message</div>";
}
?>

<form method="POST">

<input type="text" name="username" placeholder="Enter Username" required>

<input type="password" name="new_password" placeholder="New Password" required>

<input type="password" name="confirm_password" placeholder="Confirm Password" required>

<button type="submit" name="reset">
Reset Password
</button>

</form>

<a href="logo.php">← Back to Login</a>

</div>

</div>

</body>
</html>