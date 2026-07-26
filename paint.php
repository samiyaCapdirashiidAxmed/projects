<?php
$con = mysqli_connect("localhost","root","","software_project_management1");

if(!$con){
    die("Connection Failed: " . mysqli_connect_error());
}

// Ku dar tan
$message = "";

if(isset($_POST['register'])){

    $fullname = mysqli_real_escape_string($con, trim($_POST['fullname']));
    $username = mysqli_real_escape_string($con, trim($_POST['username']));
    $email    = mysqli_real_escape_string($con, trim($_POST['email']));
    $phone    = mysqli_real_escape_string($con, trim($_POST['phone']));
    $gender   = mysqli_real_escape_string($con, $_POST['gender']);
    $age      = mysqli_real_escape_string($con, $_POST['age']);

    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    if($password != $confirm_password){

        $message = "Passwords do not match!";

    }else{

        $check = mysqli_query($con, "SELECT * FROM registration1 WHERE username='$username'");

        if(mysqli_num_rows($check) > 0){

            $message = "Username already exists!";

        }else{

            $sql = "INSERT INTO registration1
            (fullname, username, email, phone, gender, age, password)
            VALUES
            ('$fullname', '$username', '$email', '$phone', '$gender', '$age', '$password')";

            if(mysqli_query($con, $sql)){
                header("Location: logo.php");
    exit();
            }else{
                $message = "Registration Failed: " . mysqli_error($con);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Patient Registration</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{
    background:#000080;
    display:flex;
    justify-content:center;
    align-items:center;
    min-height:100vh;
}

.container{
    width:850px;
    background:#fff;
    display:flex;
    border-radius:20px;
    overflow:hidden;
    box-shadow:0 10px 30px rgba(0,0,0,.3);
}

/* Left Side */

.left{
    flex:1;
    background:linear-gradient(135deg,#6a11cb,#2575fc);
    color:#fff;
    display:flex;
    justify-content:center;
    align-items:center;
    flex-direction:column;
    text-align:center;
    padding:40px;
}

.left i{
    font-size:90px;
    margin-bottom:20px;
}

.left h1{
    margin-bottom:15px;
}

/* Right Side */

.right{
    flex:1;
    padding:35px;
}

.right h2{
    text-align:center;
    margin-bottom:20px;
    color:#333;
}

.message{
    text-align:center;
    color:red;
    margin-bottom:15px;
    font-weight:bold;
}

input,
select{
    width:100%;
    padding:12px;
    margin:8px 0;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:15px;
}

input:focus,
select:focus{
    border-color:#2575fc;
    outline:none;
}

button{
    width:100%;
    padding:13px;
    background:#3c39d1;
    color:#fff;
    border:none;
    border-radius:8px;
    font-size:17px;
    cursor:pointer;
    margin-top:10px;
}

button:hover{
    background:#2575fc;
}

.login{
    text-align:center;
    margin-top:15px;
}

.login a{
    color:#3c39d1;
    text-decoration:none;
    font-weight:bold;
}

.login a:hover{
    text-decoration:underline;
}

footer {
    text-align: center;
    padding: 40px;
    color: white;
    font-size: 16px;
    margin-top: 50px;
    background: rgba(0, 0, 0, 0.2); /* Wax yar oo hoos u dhac ah si footer-ku u muuqdo */
}

.footer-content p {
    margin-bottom: 15px; /* Kala fogaanshaha qoraalka iyo icons-ka */
}
.social-icons{
    margin-top:20px;
    display:flex;
    justify-content:center;
    gap:10px;
}

.social-icons a{
    width:32px;
    height:32px;
    background:white;
    color:#2575fc;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    font-size:15px;
    transition:0.3s;
    box-shadow:0 3px 6px rgba(0,0,0,0.2);
}

.social-icons a:hover{
    transform:translateY(-3px);
    background:#ffd700;
    color:#000080;
}
</style>

</head>
<body>

<div class="container">

    <!-- Left Side -->
    <div class="left">

        <i class="fas fa-user-plus"></i>

        <h1>Hospital Management</h1>

        <p>
            Register as a patient to book appointments,
            manage your profile and access hospital services online.
        </p>
        <div class="social-icons">

   
        

</div>
        

    </div>
    
    

    <!-- Right Side -->
    <div class="right">

        <h2>Patient Registration</h2>

        <?php
        if($message!=""){
            echo "<div class='message'>$message</div>";
        }
        ?>

        <form  method="POST">

            <input type="text" name="fullname" placeholder="Full Name" required>

            <input type="text" name="username" placeholder="Username" required>

            <input type="email" name="email" placeholder="Email Address" required>

            <input type="text" name="phone" placeholder="Phone Number" required>

            <select name="gender" required>
                <option value="">Select Gender</option>
                <option>Male</option>
                <option>Female</option>
            </select>

            <input type="number" name="age" placeholder="Age" required>

            <input type="password" name="password" placeholder="Password" required>

            <input type="password" name="confirm_password" placeholder="Confirm Password" required>

            <button type="submit" name="register">
                <i class="fas fa-user-plus"></i> Register
            </button>

        </form>

        <div class="login">
            Already have an account?
            <a href="logo.php">Login Here</a>
        </div>

    </div>

</div>

</body>


</html>