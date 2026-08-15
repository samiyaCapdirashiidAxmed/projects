<?php
include("conection.php");

$message = "";

if (isset($_POST['reset'])) {

    $fullname         = mysqli_real_escape_string($con, $_POST['fullname']);
    $new_password     = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Hubi in labada password ay is leeyihiin
    if ($new_password != $confirm_password) {

        $message = "Passwords do not match!";

    } else {

        // Hubi in magacu ka jiro database-ka
        $check = mysqli_query($con, "SELECT * FROM doctor WHERE fullname='$fullname'");

        if (mysqli_num_rows($check) > 0) {

            // Cusboonaysii (Update) password-ka dhaqtarka
            $sql = "UPDATE doctor SET password='$new_password' WHERE fullname='$fullname'";

            if (mysqli_query($con, $sql)) {
                $message = "Password updated successfully.";
            } else {
                $message = "Failed to update password.";
            }

        } else {

            $message = "Doctor name not found!";

        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password - Doctor</title>
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
<p>Enter your full name and create a new password.</p>

<i class="fas fa-key" style="font-size:80px; margin-top:15px;"></i>

</div>

<div class="right">

<img src="image1.jpg" class="logo">

<h2>Forgot Password</h2>

<?php
if($message != ""){
    echo "<div class='message'>$message</div>";
}
?>

<form method="POST">

<input type="text" name="fullname" placeholder="Enter Full Name" required>

<input type="password" name="new_password" placeholder="New Password" required>

<input type="password" name="confirm_password" placeholder="Confirm Password" required>

<button type="submit" name="reset">
Reset Password
</button>

</form>

<a href="doctor.php">← Back to Doctor </a>

</div>

</div>

</body>
</html>