<?php
include "conection.php";

$message = "";
$message_type = "red"; // Message box color style ("red" or "green")

if (isset($_POST['submit'])) {

    $fullname         = trim($_POST['fullname']);
    $phone            = trim($_POST['phone']);
    $email            = trim($_POST['email']);
    $address          = trim($_POST['address']);
    $specialization   = trim($_POST['specialization']);
    $password         = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $bio              = trim($_POST['bio']);

    // 1. Check if the doctor already exists in the database (by Email or Phone)
    $check_sql  = "SELECT * FROM doctor WHERE email = ? OR phone = ? LIMIT 1";
    $check_stmt = $con->prepare($check_sql);

    if ($check_stmt) {
        $check_stmt->bind_param("ss", $email, $phone);
        $check_stmt->execute();
        $result = $check_stmt->get_result();

        // USER ALREADY EXISTS
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            // Check if the provided password matches the stored password
            if ($user['password'] !== $password) {
                $message = "This account already exists, but the password entered is incorrect!";
                $message_type = "red";
            } else {
                $message = "This doctor is already registered, and the password is correct!";
                $message_type = "green";
            }

        } else {
            // NEW USER (REGISTRATION PROCESS)

            // 2. Check if password and confirm password match
            if ($password !== $confirm_password) {
                $message = "Passwords do not match! Please try again.";
                $message_type = "red";
            } else {
                // 3. Insert into Database
                $sql  = "INSERT INTO doctor (fullname, phone, email, address, specialization, password, bio) VALUES (?, ?, ?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);

                if ($stmt) {
                    $stmt->bind_param("sssssss", $fullname, $phone, $email, $address, $specialization, $password, $bio);

                    if ($stmt->execute()) {
                        $message = "Doctor registered successfully!";
                        $message_type = "green";
                    } else {
                        $message = "Registration failed: " . $stmt->error;
                        $message_type = "red";
                    }
                    $stmt->close();
                } else {
                    $message = "Database query preparation failed!";
                    $message_type = "red";
                }
            }
        }
        $check_stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Profile</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:linear-gradient(135deg,#e8f8ff,#dff4ff,#f7fcff);
min-height:100vh;
padding:30px;
}

.container{
max-width:1300px;
margin:auto;
display:grid;
grid-template-columns:1fr 1fr;
gap:30px;
}

.card{
background:white;
border-radius:25px;
padding:35px;
box-shadow:0 10px 30px rgba(0,0,0,0.1);
}

.doctor-image{
text-align:center;
margin-bottom:20px;
}

.doctor-image img{
width:220px;
height:220px;
border-radius:50%;
object-fit:cover;
border:6px solid #00b4db;
}

.doctor-name{
font-size:35px;
color:#0077b6;
text-align:center;
margin-bottom:10px;
}

.specialist{
text-align:center;
background:#00b4db;
color:white;
padding:10px;
border-radius:20px;
margin-bottom:20px;
}

.about{
line-height:1.8;
color:#444;
margin-bottom:20px;
}

.info-box{
background:#f4fbff;
padding:15px;
margin-bottom:10px;
border-radius:12px;
font-weight:bold;
}

.skills{
display:grid;
grid-template-columns:1fr 1fr;
gap:10px;
margin-top:20px;
}

.skill{
background:#e7f8ff;
padding:12px;
border-radius:10px;
text-align:center;
font-weight:bold;
}

h2{
color:#0077b6;
margin-bottom:20px;
}

.message{
font-weight:bold;
margin-bottom:15px;
padding:12px;
border-radius:8px;
text-align:center;
}

.message.red{
background-color: #ffe6e6;
color: #d9534f;
border: 1px solid #f5c6cb;
}

.message.green{
background-color: #d4edda;
color: #155724;
border: 1px solid #c3e6cb;
}

input,textarea{
width:100%;
padding:15px;
margin-bottom:15px;
border:1px solid #ddd;
border-radius:12px;
font-size:15px;
}

button{
width:100%;
padding:15px;
border:none;
background:linear-gradient(90deg,#00b4db,#0077b6);
color:white;
font-size:18px;
font-weight:bold;
border-radius:12px;
cursor:pointer;
}

button:hover{
opacity:.9;
}

.forgot-link{
display:block;
text-align:center;
margin-top:15px;
color:#0077b6;
text-decoration:none;
font-weight:bold;
}

.forgot-link:hover{
text-decoration:underline;
}

@media(max-width:900px){
.container{
grid-template-columns:1fr;
}
}

</style>
</head>
<body>

<div class="container">

<!-- Doctor Profile -->
<div class="card">

<div class="doctor-image">
<img src="doctor.jpg" alt="Doctor">
</div>

<h1 class="doctor-name">Dr. Amina Mohamed</h1>

<div class="specialist">
Senior Medical Specialist
</div>

<p class="about">
Dr. Amina Mohamed is a highly qualified medical professional with more than 12 years of experience in patient care, disease diagnosis, preventive medicine, emergency treatment, and healthcare management. She is committed to providing compassionate, high-quality healthcare services and ensuring every patient receives professional medical attention.
</p>

<div class="info-box">Experience: 12+ Years</div>
<div class="info-box">Education: MBBS, MD</div>
<div class="info-box">Department: General Medicine</div>
<div class="info-box">Working Hours: Mon - Sat (8AM - 6PM)</div>

<div class="skills">
<div class="skill">Patient Care</div>
<div class="skill">Emergency Care</div>
<div class="skill">Medical Consultation</div>
<div class="skill">Health Screening</div>
<div class="skill">Diagnosis</div>
<div class="skill">Treatment Planning</div>
</div>

</div>

<!-- Registration Form -->
<div class="card">

<h2>Doctor Registration</h2>

<?php if (!empty($message)): ?>
    <div class="message <?php echo $message_type; ?>">
        <?php echo $message; ?>
    </div>
<?php endif; ?>

<form method="POST" action="">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<input type="email" name="email" placeholder="Email Address" required>

<input type="text" name="address" placeholder="Home Address" required>

<input type="text" name="specialization" placeholder="Specialization" required>

<input type="password" name="password" placeholder="Password" required>

<input type="password" name="confirm_password" placeholder="Confirm Password" required>

<textarea name="bio" rows="5" placeholder="Short Biography"></textarea>

<button type="submit" name="submit">
Register Doctor
</button>

<a href="rem.php" class="forgot-link">Forgot Password?</a>

</form>

</div>

</div>

</body>
</html>