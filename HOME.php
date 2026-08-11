<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Hospital Appoment Booking</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f9fc;
    color:#1e293b;
}



header{
    width:100%;
    background:white;
    box-shadow:0 3px 15px rgba(0,0,0,0.08);
    position:sticky;
    top:0;
    z-index:1000;
}

.navbar{
    width:92%;
    max-width:1250px;
    margin:auto;
    height:75px;

    display:flex;
    align-items:center;
    justify-content:space-between;
}

.logo{
    text-decoration:none;
    display:flex;
    align-items:center;
    gap:10px;
}

.logo-icon{
    width:45px;
    height:45px;
    border-radius:12px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#0ea5e9;
    color:white;
    font-size:22px;

    box-shadow:0 5px 15px rgba(14,165,233,.3);
}

.logo h2{
    color:#075985;
    font-size:21px;
    font-weight:700;
}

.logo span{
    color:#10b981;
}

/* NAVIGATION */

.nav-menu{
    list-style:none;
    display:flex;
    align-items:center;
    gap:5px;
}

.nav-menu a{
    text-decoration:none;
    color:#475569;
    font-size:14px;
    font-weight:500;

    padding:10px 14px;
    border-radius:8px;

    transition:.3s;
}

.nav-menu a:hover{
    background:#e0f2fe;
    color:#0284c7;
}

.nav-menu .login{
    background:#0284c7;
    color:white;
}

.nav-menu .login:hover{
    background:#0369a1;
    color:white;
}


.hero{
    min-height:600px;

    background:
    linear-gradient(
        rgba(3,105,161,.75),
        rgba(15,118,110,.70)
    ),
    url('home.jpg');

    background-size:cover;
    background-position:center;

    display:flex;
    align-items:center;
    justify-content:center;

    text-align:center;
    padding:80px 20px;
}

.hero-content{
    max-width:850px;
    color:white;
}

.small-title{
    display:inline-block;

    background:rgba(255,255,255,.15);
    border:1px solid rgba(255,255,255,.3);

    padding:8px 18px;
    border-radius:30px;

    font-size:14px;
    margin-bottom:20px;

    backdrop-filter:blur(5px);
}

.hero h1{
    font-size:55px;
    line-height:1.2;
    font-weight:800;
    margin-bottom:20px;
}

.hero h1 span{
    color:#a7f3d0;
}

.hero h3{
    font-size:21px;
    font-weight:500;
    margin-bottom:18px;
}

.hero p{
    max-width:700px;
    margin:auto;

    font-size:15px;
    line-height:1.8;

    color:#e0f2fe;
}


.buttons{
    margin-top:35px;

    display:flex;
    justify-content:center;
    gap:15px;
}

.btn{
    text-decoration:none;

    padding:14px 27px;
    border-radius:8px;

    font-size:14px;
    font-weight:600;

    display:inline-flex;
    align-items:center;
    gap:8px;

    transition:.3s;
}

.btn-register{
    background:#10b981;
    color:white;

    box-shadow:0 8px 20px rgba(16,185,129,.3);
}

.btn-register:hover{
    background:#059669;
    transform:translateY(-3px);
}

.btn-book{
    background:white;
    color:#0369a1;
}

.btn-book:hover{
    background:#e0f2fe;
    transform:translateY(-3px);
}


.services{
    width:90%;
    max-width:1150px;

    margin:-65px auto 70px;

    position:relative;
    z-index:5;

    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:25px;
}

.card{
    background:white;

    padding:32px 25px;

    border-radius:15px;

    text-align:center;

    box-shadow:0 10px 30px rgba(0,0,0,.08);

    border-top:4px solid #0ea5e9;

    transition:.3s;
}

.card:hover{
    transform:translateY(-8px);
    box-shadow:0 18px 35px rgba(0,0,0,.12);
}

.card:nth-child(2){
    border-top-color:#10b981;
}

.card:nth-child(3){
    border-top-color:#6366f1;
}

.card-icon{
    width:65px;
    height:65px;

    margin:0 auto 18px;

    border-radius:50%;

    display:flex;
    align-items:center;
    justify-content:center;

    background:#e0f2fe;
    color:#0284c7;

    font-size:26px;
}

.card:nth-child(2) .card-icon{
    background:#d1fae5;
    color:#059669;
}

.card:nth-child(3) .card-icon{
    background:#e0e7ff;
    color:#4f46e5;
}

.card h3{
    font-size:18px;
    margin-bottom:10px;
    color:#0f172a;
}

.card p{
    font-size:13px;
    line-height:1.7;
    color:#64748b;
}


.about{
    width:90%;
    max-width:1100px;

    margin:0 auto 70px;

    display:flex;
    align-items:center;
    gap:50px;
}

.about-image{
    flex:1;
}

.about-image img{
    width:100%;
    border-radius:18px;

    box-shadow:0 15px 35px rgba(0,0,0,.12);
}

.about-text{
    flex:1;
}

.about-text .label{
    color:#0284c7;
    font-size:14px;
    font-weight:600;
}

.about-text h2{
    font-size:32px;
    margin:10px 0 15px;
    color:#0f172a;
}

.about-text p{
    color:#64748b;
    font-size:14px;
    line-height:1.8;
    margin-bottom:20px;
}

.check{
    margin:10px 0;
    font-size:14px;
    color:#475569;
}

.check i{
    color:#10b981;
    margin-right:8px;
}



footer{
    background:#0f172a;
    color:white;

    padding:40px 20px;

    text-align:center;
}

.footer-logo{
    font-size:21px;
    font-weight:700;
    margin-bottom:10px;
}

.footer-logo span{
    color:#10b981;
}

footer p{
    color:#94a3b8;
    font-size:13px;
    margin-bottom:20px;
}

.social{
    display:flex;
    justify-content:center;
    gap:12px;
}

.social a{
    width:38px;
    height:38px;

    border-radius:50%;

    background:#1e293b;
    color:white;

    display:flex;
    align-items:center;
    justify-content:center;

    text-decoration:none;

    transition:.3s;
}

.social a:hover{
    background:#0284c7;
    transform:translateY(-4px);
}



@media(max-width:850px){

    .navbar{
        height:auto;
        padding:15px 0;
        flex-direction:column;
        gap:12px;
    }

    .nav-menu{
        flex-wrap:wrap;
        justify-content:center;
    }

    .hero h1{
        font-size:40px;
    }

    .services{
        grid-template-columns:1fr;
        margin-top:30px;
    }

    .about{
        flex-direction:column;
    }
}

@media(max-width:550px){

    .nav-menu a{
        font-size:12px;
        padding:8px 9px;
    }

    .hero{
        min-height:520px;
    }

    .hero h1{
        font-size:32px;
    }

    .hero h3{
        font-size:17px;
    }

    .buttons{
        flex-direction:column;
    }

    .btn{
        justify-content:center;
    }

}

</style>
</head>

<body>

<?php

$hospital_name = "Care Plus Hospital Booking";
$current_year = date("Y");

?>

<!-- HEADER -->

<header>

<nav class="navbar">

<a href="index.php" class="logo">

<div class="logo-icon">
<i class="fas fa-hospital"></i>
</div>

<h2>Care <span>Plus</span></h2>

</a>

<ul class="nav-menu">

<li>
<a href="paint.php">
<i class="fas fa-user-plus"></i> Registration
</a>
</li>

<li>
<a href="login.php" class="login">
<i class="fas fa-sign-in-alt"></i> Login
</a>
</li>

<li>
<a href="appointment.php">
<i class="fas fa-calendar-check"></i> Appointment
</a>
</li>

<li>
<a href="doctors.php">
<i class="fas fa-user-md"></i> Doctors
</a>
</li>

<li>
<a href="report.php">
<i class="fas fa-file-medical"></i> Report
</a>
</li>

</ul>

</nav>

</header>


<!-- HERO -->

<section class="hero">

<div class="hero-content">

<div class="small-title">
<i class="fas fa-heartbeat"></i>
 Hospital Appoment BOOking
</div>

<h1>
Welcome to <span><?php echo $hospital_name; ?></span>
</h1>

<h3>
Your Health, Our Priority
</h3>

<p>
We provide professional healthcare services with qualified doctors,
easy appointment booking, and reliable medical support for every patient.
</p>

<div class="buttons">

<a href="paint.php" class="btn btn-register">
<i class="fas fa-user-plus"></i>
Register Now
</a>

<a href="appointment.php" class="btn btn-book">
<i class="fas fa-calendar-alt"></i>
Book Appointment
</a>

</div>

</div>

</section>


<!-- SERVICES -->

<section class="services">

<div class="card">

<div class="card-icon">
<i class="fas fa-user-md"></i>
</div>

<h3>Qualified Doctors</h3>

<p>
Meet our experienced and professional doctors
who provide quality healthcare services.
</p>

</div>


<div class="card">

<div class="card-icon">
<i class="fas fa-calendar-check"></i>
</div>

<h3>Easy Appointment</h3>

<p>
Book your hospital appointment online quickly
without waiting in long queues.
</p>

</div>


<div class="card">

<div class="card-icon">
<i class="fas fa-file-medical"></i>
</div>

<h3>Medical Reports</h3>

<p>
Manage and access medical reports through
our simple and secure hospital system.
</p>

</div>

</section>


<!-- ABOUT -->

<section class="about">

<div class="about-image">

<img src="home.jpg" alt="Care Plus Hospital">

</div>


<div class="about-text">

<span class="label">
ABOUT CARE PLUS
</span>

<h2>
Modern Healthcare For Everyone
</h2>

<p>
Care Plus Hospital Booking System makes it easier
for patients to connect with doctors and manage
their appointments online.
</p>

<div class="check">
<i class="fas fa-check-circle"></i>
Professional Medical Services
</div>

<div class="check">
<i class="fas fa-check-circle"></i>
Easy Online Appointment Booking
</div>

<div class="check">
<i class="fas fa-check-circle"></i>
Experienced Doctors
</div>

<div class="check">
<i class="fas fa-check-circle"></i>
Secure Medical Reports
</div>

</div>

</section>


<!-- FOOTER -->

<footer>

<div class="footer-logo">
hospital<span>Appoment</span> Booking
</div>

<p>
&copy; <?php echo $current_year; ?> ISKAASHI GROUP.
All Rights Reserved.
</p>

<div class="social">

<a href="https://www.facebook.com" target="_blank">
<i class="fab fa-facebook-f"></i>
</a>

<a href="https://www.twitter.com" target="_blank">
<i class="fab fa-twitter"></i>
</a>

<a href="https://www.instagram.com" target="_blank">
<i class="fab fa-instagram"></i>
</a>

</div>

</footer>

</body>
</html>