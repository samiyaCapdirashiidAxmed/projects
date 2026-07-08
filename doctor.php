<?php
include "conection.php";

$message = "";

if(isset($_POST['submit'])){

    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $specialization = $_POST['specialization'];
    $password = $_POST['password'];
    $bio = $_POST['bio'];

    $sql = "INSERT INTO doctor
    (fullname, phone, email, address, specialization, password, bio)
    VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $con->prepare($sql);

    $stmt->bind_param(
        "sssssss",
        $fullname,
        $phone,
        $email,
        $address,
        $specialization,
        $password,
        $bio
    );

    if($stmt->execute()){
        $message = "Doctor registered successfully!";
    }else{
        $message = "Registration failed!";
    }
}
?>
<?php
$message = "";

if(isset($_POST['submit'])){
    $message = "Doctor information submitted successfully!";
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
color:green;
font-weight:bold;
margin-bottom:15px;
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

<div class="message">
<?php echo $message; ?>
</div>

<form method="POST">

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

</form>

</div>

</div>

</body>
</html>