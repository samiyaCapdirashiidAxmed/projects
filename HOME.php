<!DOCTYPE html>
<html lang="en">
    <head>
        <center>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>coffee websit </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
/* Reset */
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    /
    background: #706060 url('home.jpg') no-repeat center center fixed;
    
    background-size: cover;
    
    font-family: Arial, sans-serif;
   
}
/* Navbar */
header{
    background: #444afe;
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
    background: #e7f927;
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
    background-image: url("home.jpg");
    background-position: center;
    

}

/* Footer */
footer{
    background: #2d1cca;
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
    color: #2aa3c2;

    background-image: url('home.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

/* Styling-ka Social Icons */
.social-icons {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    gap: 20px;
}

.social-icons a {
    color: white;
    font-size: 24px;
    transition: 0.3s;
}

/* Saamaynta marka mouse-ka la saaro */
.social-icons a:hover {
    color: #dc7ce2; /* Midabka dahabiga ah */
    transform: scale(1.2);
}

    </style>
    </head>
   
    <body >
         
        <!--header/navbar-->
        <header>
            <nav class="navbar section-contnant">
                <a href="#" class="nav-logo">
                    <h2 class="logo-text">🏥hospital  </h2>
                </a>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="paint.php" class="nav-link">👤registration</a>
                    </li>
                </ul>
                
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">🔑LOGING </a>
                    </li>
                </ul>
        
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">📅APPOMENT</a>
                    </li>
                </ul>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">👨‍⚕️DOCTORE </a>
                    </li>
                </ul>
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">📅BOOKING</a>
                    </li>
                </ul>
                 <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">📊REPORT</a>
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
            <a href="paint.php" class="buttons order-now">👤registration</a><br>
          
        </div>      
        
                    </div>
                    <div class="hero-image-wrapper">
                    </div>
                </div>
            </sectioc>
        </main>
    </body></center>
<footer class="main-footer">
    <p>&copy; 2026 ISKAASHI GROUP. All Rights Reserved.</p>
    <div class="social-icons">
        <a href="https://www.facebook.com" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
        <a href="https://www.twitter.com" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
        <a href="https://www.instagram.com" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
    </div>
</footer>>
</br>
                                                                                                                                                                                                                                                                                      


</html>