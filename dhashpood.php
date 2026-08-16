<?php
include "conection.php";

// Total Doctors
$doctor = mysqli_query($con, "SELECT COUNT(*) AS total FROM appointments");
$appoment_total = mysqli_fetch_assoc($doctor)['total'];

// Total Patients
$patient = mysqli_query($con, "SELECT COUNT(*) AS total FROM registration1");
$patient_total = mysqli_fetch_assoc($patient)['total'];

// Total Bookings/Appointments
$booking = mysqli_query($con, "SELECT COUNT(*) AS total FROM booking");
$booking_total = mysqli_fetch_assoc($booking)['total'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:#eef5fb;
}

.header{
background:#0077b6;
color:white;
padding:20px;
text-align:center;
font-size:30px;
font-weight:bold;
}

.container{
display:flex;
min-height:90vh;
}

.sidebar{
    width:220px;
    background:#023e8a;
}

.sidebar h2{
    color:white;
    text-align:center;
    padding:18px;
    font-size:20px;
    border-bottom:1px solid rgba(255,255,255,.3);
}

.sidebar a{
    display:block;
    padding:14px 18px;
    color:white;
    text-decoration:none;
    font-size:16px;
    border-bottom:1px solid rgba(255,255,255,.1);
    transition:0.3s;
}

.sidebar a:hover{
    background:#0096c7;
    padding-left:25px;
}

.content{
    flex:1;
    padding:20px;
}
.content{
flex:1;
padding:30px;
}

.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
gap:25px;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit,minmax(130px,1fr));
    gap:10px;
}

.card{
    background:white;
    border-radius:8px;
    padding:12px;
    text-align:center;
    box-shadow:0 2px 8px rgba(0,0,0,.12);
    transition:.3s;
}

.card:hover{
    transform:translateY(-2px);
}

.card h3{
    color:#0077b6;
    font-size:15px;
    margin-bottom:8px;
}

.card h1{
    font-size:28px;
    color:#023e8a;
    margin-bottom:8px;
}

.card p{
    font-size:12px;
    color:#666;
    margin-bottom:10px;
}

.card a{
    display:inline-block;
    padding:6px 12px;
    background:#0077b6;
    color:white;
    text-decoration:none;
    border-radius:5px;
    font-size:11px;
}

.card a:hover{
    background:#005f8d;
}

.footer{
background:#0077b6;
color:white;
text-align:center;
padding:15px;
}

.social-icons{
    display:flex;
    justify-content:center;
    gap:15px;
    margin:20px 0;
}

.social-icons a{
    width:45px;
    height:45px;
    background:#0077b6;
    color:#fff;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    font-size:20px;
    transition:0.3s;
}

.social-icons a:hover{
    background:#005f8d;
    transform:translateY(-5px);
}

</style>

</head>

<body>

<div class="header">
Hospital Appoment Booking System Dashboard
</div>

<div class="container">

<div class="sidebar">

<h2>MENU</h2>

<a href="dhashpood.php">🏠 Dashboard</a>

<a href="doctor.php">👨‍⚕️ Doctor Registration</a>

<a href="paint.php">🧑 Patient Registration</a>

<a href="appoiment.php">📅 Appointment</a>

<a href="booking.php">📑 Booking </a>
<a href="reportpage.php">📋  Report</a>

<a href="logo.php">🚪 Logout</a>

</div>

<div class="content">

<div class="cards">

<div class="card">
<h3>Appoment </h3>

<h1><?php echo $appoment_total; ?></h1>

<p>Total booking</p>

<a href="report1.php">View Report</a>

</div>

<div class="card">

<h3>🧑 Patients</h3>

<h1><?php echo $patient_total; ?></h1>

<p>Total Registered Patients</p>

<a href="report2.php">View Report</a>

</div>

<div class="card">

<h3>📅 BOOking</h3>

<h1><?php echo $booking_total; ?></h1>

<p>Total appoment</p>

<a href="report.php">View Report</a>

</div>


</div>

</div>

</div>

<div class="footer">
© 2026 Hospital Management System | Dashboard
<div class="social-icons">
    <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>

    <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>

    <a href="https://twitter.com" target="_blank"><i class="fab fa-x-twitter"></i></a>

    <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin-in"></i></a>

    <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>

    <a href="https://wa.me/252612345678" target="_blank"><i class="fab fa-whatsapp"></i></a>
</div>

</div>


</body>
</html>