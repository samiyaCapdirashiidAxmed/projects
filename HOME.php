<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Care Plus Hospital - Home</title>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        /* CSS Reset & Variables */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        :root {
            --primary: #0284c7;
            --primary-dark: #0369a1;
            --secondary: #0d9488;
            --accent: #f0fdf4;
            --text-dark: #1e293b;
            --text-light: #64748b;
            --bg-light: #f8fafc;
            --white: #ffffff;
            --shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
        }

        body {
            
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Modern Glassmorphism & Sticky Header */
        header {
            background: rgba(70, 60, 60, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(156, 136, 136, 0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 90%;
            max-width: 1280px;
            margin: auto;
            padding: 20px 0;
        }

        .logo-link {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-text {
            color: white;
            font-size: 22px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .nav-link {
            text-decoration: none;
            color: var(--text-light);
            font-size: 14px;
            font-weight: 500;
            padding: 10px 16px;
            border-radius: 50px;
            transition: all 0.3s ease;
        }

        .nav-link:hover, .nav-link.active {
            color: var(--primary);
            background-color: #95cbee;
        }

        /* Gorgeous Hero Section with Gradient Overlay */
        .hero-section {
            background: url('home.jpg');
            background-size: cover;
            background-position: center;
            padding: 130px 20px;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            flex: 1;
        }

        .hero-content {
            max-width: 850px;
            margin: auto;
        }

        .hero-title {
            font-size: 52px;
            font-weight: 800;
            margin-bottom: 20px;
            color: var(--white);
            line-height: 1.2;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 20px;
            font-weight: 500;
            margin-bottom: 20px;
            color: #9a9bce;
        }

        .hero-desc {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 40px;
            color: #a6c2d8;
        }

        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 16px;
        }

        .btn {
            text-decoration: none;
            padding: 15px 32px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 15px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .btn-primary {
            background-color: #10b981;
            color: white;
            box-shadow: 0 10px 20px -5px rgba(16, 185, 129, 0.4);
        }

        .btn-primary:hover {
            background-color: #059669;
            transform: translateY(-3px);
            box-shadow: 0 15px 25px -5px rgba(16, 185, 129, 0.5);
        }

        .btn-secondary {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
        }

        .btn-secondary:hover {
            background-color: white;
            color: var(--text-dark);
            border-color: white;
            transform: translateY(-3px);
        }

        /* Modern Floating Feature Cards */
        .features-section {
            width: 90%;
            max-width: 1200px;
            margin: -70px auto 80px auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 30px;
            position: relative;
            z-index: 10;
        }

        .feature-card {
            background: var(--white);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: var(--shadow);
            text-align: center;
            transition: all 0.4s ease;
            border: 1px solid rgba(0, 0, 0, 0.02);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.1);
        }

        .icon-box {
            width: 75px;
            height: 75px;
            background: #e0f2fe;
            color: var(--primary);
            font-size: 30px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px auto;
            transition: all 0.3s ease;
        }

        .feature-card:hover .icon-box {
            background: var(--primary);
            color: var(--white);
            transform: rotate(6deg);
        }

        .feature-card h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
            color: var(--text-dark);
        }

        .feature-card p {
            font-size: 14px;
            line-height: 1.6;
            color: var(--text-light);
        }

        /* Professional Footer */
        footer {
            background: #0f172a;
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin-top: auto;
        }

        footer p {
            font-size: 14px;
            color: #94a3b8;
            margin-bottom: 20px;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.05);
            color: white;
            font-size: 16px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                gap: 15px;
            }

            .nav-menu {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero-title {
                font-size: 36px;
            }

            .hero-subtitle {
                font-size: 18px;
            }

            .hero-buttons {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>
</head>
<body>

    <!-- PHP Dynamic Header Integration Example -->
    <?php 
        $hospital_name = "Care Plus Hospital Booking";
        $current_year = date("Y");
    ?>

    <!-- Navbar -->
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo-link">
                <h2 class="logo-text">🏥 Care Plus</h2>
            </a>
            <ul class="nav-menu">
                <li><a href="index.php" class="nav-link active">🏠 Home</a></li>
                <li><a href="paint.php" class="nav-link">👤 Registration</a></li>
                <li><a href="login.php" class="nav-link">🔑 Login</a></li>
                <li><a href="appointment.php" class="nav-link">📅 Appointment</a></li>
                <li><a href="doctors.php" class="nav-link">👨‍⚕️ Doctors</a></li>
                <li><a href="report.php" class="nav-link">📊 Report</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content">
            <h1 class="hero-title"><?php echo $hospital_name; ?></h1>
            <h3 class="hero-subtitle">Make your life better with our special healthcare.</h3>
            <p class="hero-desc">Welcome to our hospital, where every patient matters and every treatment brings hope, healing, and professional medical care tailored to your family's needs.</p>
            <div class="hero-buttons">
                <a href="paint.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> Register Now</a>
                <a href="appointment.php" class="btn btn-secondary"><i class="fas fa-calendar-alt"></i> Book Appointment</a>
            </div>
        </div>
    </section>

    <!-- Quick Features Section -->
    <div class="features-section">
        <div class="feature-card">
            <div class="icon-box">
                <i class="fas fa-user-md"></i>
            </div>
            <h3>Qualified Doctors</h3>
            <p>Our hospital features specialized and experienced doctors ready to help you 24/7 with professional expertise.</p>
        </div>
        <div class="feature-card">
            <div class="icon-box">
                <i class="fas fa-calendar-check"></i>
            </div>
            <h3>Easy Booking</h3>
            <p>Schedule your appointments online quickly and seamlessly without waiting in long hospital queues.</p>
        </div>
        <div class="feature-card">
            <div class="icon-box">
                <i class="fas fa-file-medical-alt"></i>
            </div>
            <h3>Medical Reports</h3>
            <p>Access and check your medical test reports safely and securely straight through our platform.</p>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo $current_year; ?> ISKAASHI GROUP. All Rights Reserved.</p>
        <div class="social-icons">
            <a href="https://www.facebook.com" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.twitter.com" target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            <a href="https://www.instagram.com" target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
        </div>
    </footer>

</body>
</html>