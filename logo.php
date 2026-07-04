
<?php

include('conection.php');

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hubinta isticmaalaha
    
    $sql = "SELECT * FROM logo WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

   if (mysqli_num_rows($result) == 1) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php"); // Meesha uu aadayo markuu login-ka saxo
    } else {
        echo "<script>alert('Username ama Password khaldan!'); window.location='index.html';</script>";
   
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
    font-family: Arial, sans-serif;
    /* Sets the page background to Navy Blue */
    background-color: #000080; 
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}
        /* New main container for two columns */
        .main-container {
            display: flex;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            width: 700px;
            max-width: 90%;
        }
        /* Left Side: Welcome Message */
        .welcome-side {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 40px;
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        /* Right Side: Login Form */
        .login-side {
            padding: 40px;
            flex: 1;
        }
        .login-box { text-align: center; }
        .logo { width: 80px; margin-bottom: 15px; }
        input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
        }
        .submit-btn {
            width: 100%;
            padding: 12px;
            background: #3c39d1;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
.social-icons {
    margin-top: 20px;
}

.social-icons a {
    color: white;
    font-size: 24px;
    margin: 0 10px;
    text-decoration: none;
    transition: 0.3s;
}

.social-icons a:hover {
    color: #95f7be; /* Light blue color when hovering */
    transform: scale(1.2);
}

        }
    </style>
</head>
<body>

<div class="main-container">
    <!-- Welcome Section -->
    <div class="welcome-side">
        
    <!-- Welcome Section -->
<div class="welcome-side">
    <h1>Welcome Back!</h1>
    <p>Please enter your credentials to access your account.</p>
    
    <!-- Social Icons -->
    <div class="social-icons">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-linkedin"></i></a>
    </div>
</div>
    </div>

    <!-- Login Section -->
    <div class="login-side">
        <div class="login-box">
            <img src="image1.png" class="logo" alt="Logo">
            <h2>Login</h2>
            <form action="registration.php" method="POST">
                <input type="text" name="username" placeholder="Enter username" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <button type="submit" name="login_btn" class="submit-btn">LOGIN</button>
            </form>
            <a href="registration.php" style="display:block; margin-top:15px; font-size:14px;">Need an account? Register</a>
        </div>
    </div>
</div>

</body>
</html>