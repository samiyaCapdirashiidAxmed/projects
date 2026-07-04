
<!DOCTYPE html>
<html lang="en">
    <head>
        <center>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coffee websit </title>
    <link rel="stylesheet" href="style.css" >
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
    /* Reset */
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: Arial, sans-serif;
    background: #f4f4f4;
    color: #333;
}

/* Navbar */
header{
    background: #6F4E37;
    padding: 15px 0;
}

.navbar{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
    margin: auto;
}

.logo-text{
    color: white;
    font-size: 30px;
}


.nav-menu{
    list-style: none;
    display: flex;
}

.nav-item{
    margin-left: 20px;
}

.nav-link{
    text-decoration: none;
    color: white;
    font-weight: bold;
    transition: 0.3s;
}

.nav-link:hover{
    color: #FFD700;
}

/* Hero Section */
.hero-section{
    min-height: 90vh;
    background: linear-gradient(rgba(0,0,0,0.5),
    rgba(0,0,0,0.5)),
    url('ww.gbj.jpg');
    background-size: cover;
    background-position: center;
    display: flex;
    align-items: center;
    justify-content: center;
}

.section-contenat{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 90%;
    margin: auto;
    color: white;
}

.hero-details{
    max-width: 600px;
}

.titel{
    font-size: 50px;
    color: #FFD700;
    margin-bottom: 15px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}

.description{
    font-size: 20px;
    margin-bottom: 15px;
}

.buttons{
    margin-top: 20px;
}

.order-now,
.contact-us{
    display: inline-block;
    text-decoration: none;
    padding: 12px 25px;
    margin-right: 10px;
    border-radius: 30px;
    font-weight: bold;
    transition: 0.3s;
}

.order-now{
    background: #FFD700;
    color: black;
}

.order-now:hover{
    background: white;
}

.contact-us{
    background: transparent;
    border: 2px solid white;
    color: white;
}

.contact-us:hover{
    background: white;
    color: black;
}

/* Image */
.hero-image{
    width: 400px;
    border-radius: 150px;
    box-shadow: 0 5px 15px rgba(153, 118, 118, 0.5);
    height: 500;
    border: 20px;
    object-fit: cover;
    background-image: url("image.png");
    background-position: center;
    

}

/* Footer */
footer{
    background: #6F4E37;
    color: white;
    text-align: center;
    padding: 15px;
    font-weight: bold;
}

/* Responsive */
@media(max-width:768px){
    .section-contenat{
        flex-direction: column;
        text-align: center;
    }

    .hero-image{
        width: 300px;
        margin-top: 20px;
    }

    .navbar{
        flex-direction: column;
    }

    .nav-menu{
        margin-top: 10px;
    }
}
body{
    font-family: Arial, sans-serif;
    color: #333;

    background-image: url('image.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
<<<<<<< HEAD
=======

    /* Social Media Footer Styling */
.social-icons {
    margin-bottom: 15px;
    display: flex;
    justify-content: center;
    gap: 20px; /* Space between icons */
}

.social-icons a {
    color: wheat;
    font-size: 28px; /* Size of the icons */
    text-decoration: none;
    transition: transform 0.3s ease, color 0.3s ease;
}

/* Hover effect: Scale up and change color */
.social-icons a:hover {
    color: #FFD700; /* Gold color */
    transform: scale(1.2); /* Slightly enlarges the icon */
}
>>>>>>> 9432f1965a6ebb85635e82774221dd38ed9cb607
}
</style>
            
    </head>
   
    <body >
         
        <!--header/navbar-->
<<<<<<< HEAD
=======


>>>>>>> 9432f1965a6ebb85635e82774221dd38ed9cb607
        <header>
            <nav class="navbar section-contnant">
                <a href="#" class="nav-logo">
                    <h2 class="logo-text">hospital  </h2>
                </a>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="registration.php" class="nav-link">registration</a>
                    </li>
                </ul>
                
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="logo.php" class="nav-link">lOGING </a>
                    </li>
                </ul>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="Edit.php" class="nav-link">EDINT</a>
                    </li>
                </ul>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="APPOMENT.php" class="nav-link">APPOMENT</a>
                    </li>
                </ul>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="DECTORE.php" class="nav-link">DECTORE </a>
                    </li>
                </ul>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="BOOKING.php" class="nav-link">BOOKING</a>
                    </li>
                </ul>
            </nav>
        </header>
        
        <main>
            <!--hero section-->
            <sectioc class="hero-section">
                <div class="section-contenat">
                    <div class="hero-details">
                       <p> <h2 class="titel">BEST HOSPITAL</h2>
                        <h3 class="description">Make your life better with our special healthcare.</h3>
                        <p class="description">Welcome to our hospital, where every patient matters and every treatment brings hope and healing.</p>
      </p>
                        <div class="buttons">
            <a href="logo.php" class="buttons order-now">loging</a><br>
          
        </div>      
        
                    </div>
                    <div class="hero-image-wrapper">
                <!--<img src="image.png" alt="hero" class="hero-image"> -->
                    </div>
                </div>
               <!--<img src="ww.gbj.jpg" alt="hero" class="hero-image"> -->
            </sectioc>
        </main>
    </body></center>

    <footer>
<<<<<<< HEAD
                                            All Copy Right is ISKAASHI GROUP
=======
                                            <footer>
    <div class="social-icons">
        <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
        <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
        <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
    </div>    

    <p>&copy; 2026 ISKAASHI GROUP - All Rights Reserved</p>
</footer>
>>>>>>> 9432f1965a6ebb85635e82774221dd38ed9cb607
                                                                                                                                                                                                                                                                                      

    </footer>
</html>
<<<<<<< HEAD
=======
<?php
// doctor_home.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Doctor Homepage</title>
  <style>
    body {margin:0; font-family:Arial, sans-serif; background:#f4f7fb;}
    header {background:#2a9d8f; color:#fff; padding:20px;}
    nav ul {list-style:none; margin:0; padding:0; display:flex; justify-content:center;}
    nav ul li {margin:0 15px;}
    nav ul li a {color:#fff; text-decoration:none; font-weight:bold;}
    .hero {background:url('https://images.unsplash.com/photo-1588776814546-ec7c7c7a3a2a') no-repeat center/cover; height:400px; display:flex; align-items:center; justify-content:center; color:#fff; font-size:2.5em; font-weight:bold;}
    .section {padding:50px; text-align:center;}
    .section h2 {color:#264653; margin-bottom:20px;}
    .doctors {display:grid; grid-template-columns:repeat(auto-fit,minmax(250px,1fr)); gap:20px;}
    .doctor-card {background:#fff; border-radius:8px; box-shadow:0 4px 8px rgba(0,0,0,0.1); padding:20px;}
    .doctor-card img {width:100%; border-radius:8px;}
    footer {background:#264653; color:#fff; text-align:center; padding:20px;}
  </style>
</head>
<body>
  <header>
    <h1>City Hospital</h1>
    <nav>
      <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">Doctors</a></li>
        <li><a href="#">Services</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
    </nav>
  </header>

  <div class="hero">
    Welcome to Our Hospital
  </div>

  <div class="section">
    <h2>Our Doctors</h2>
    <div class="doctors">
      <div class="doctor-card">
        <img src="image.png" alt="Doctor 1">
        <h3>Dr.dactor</h3>
        <p>Cardiologist</p>
      </div>
      <div class="doctor-card">
        <img src="image1.png" alt="Doctor 2">
        <h3>Dr. Ahmed Ali</h3>
        <p>Pediatrician</p>
      </div>
      <div class="doctor-card">
        <img src="pharmacy - Search Images.png" alt="Doctor 3">
        <h3>Dr. Maria Lopez</h3>
        <p>Neurologist</p>
      </div>
    </div>
  </div>

  <div class="section">
    <h2>Facilities</h2>
    <p>We provide modern laboratories, a full-service pharmacy, and advanced diagnostic equipment to ensure the best care for our patients.</p>
  </div>

  <footer>
    <p>&copy; 2026 City Hospital | Contact: info@cityhospital.com</p>
  </footer>
</body>
</html>
>>>>>>> 9c7e94c20aade56199d08d03c0454f0c6005fabf
=======
>>>>>>> 9432f1965a6ebb85635e82774221dd38ed9cb607
