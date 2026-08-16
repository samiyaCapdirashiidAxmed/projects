<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software_project_management2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

if (isset($_POST['book'])) {

    $fullname = trim($_POST['fullname']);
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $doctor = $_POST['doctor'];
    $department = $_POST['department'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $notes = $_POST['notes'];
    $currency = $_POST['currency'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];

    // PHP Validation: Ensure Full Name contains letters and spaces only (no numbers)
    if (!preg_match("/^[a-zA-Z\s]+$/", $fullname)) {
        $message = "Full Name must contain letters and spaces only (no numbers allowed)!";
    } else {
        // Insert appointment & payment data into database
        $sql = "INSERT INTO appointments
        (fullname, email, phone, doctor, department, date, time, notes, currency, amount, payment_method)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param(
            "sssssssssds",
            $fullname,
            $email,
            $phone,
            $doctor,
            $department,
            $date,
            $time,
            $notes,
            $currency,
            $amount,
            $payment_method
        );

        if ($stmt->execute()) {
            $message = "Appointment booked and payment recorded successfully!";
        } else {
            $message = "Booking failed! Error: " . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Appointment Booking & Payment</title>

<style>

*{
  margin:0;
  padding:0;
  box-sizing:border-box;
  font-family:Arial,sans-serif;
}

body{
  background:
  linear-gradient(rgba(0,40,80,.60),rgba(0,40,80,.60)),
  url('hospital.jpg');
  background-size:cover;
  background-position:center;
  background-attachment:fixed;
  min-height:100vh;
  display:flex;
  justify-content:center;
  align-items:center;
  padding:40px;
}

.container{
  width:1100px;
  display:grid;
  grid-template-columns:1fr 1fr;
  background:#fff;
  border-radius:25px;
  overflow:hidden;
  box-shadow:0 20px 50px rgba(0,0,0,.3);
}

.left{
  background:linear-gradient(135deg,#0077b6,#00b4d8);
  color:white;
  padding:50px;
}

.left h1{
  font-size:40px;
  margin-bottom:20px;
}

.left p{
  line-height:1.9;
  margin-bottom:20px;
}

.feature{
  background:rgba(255,255,255,.15);
  padding:15px;
  border-radius:12px;
  margin-top:15px;
}

.right{
  padding:50px;
}

.right h2{
  text-align:center;
  color:#0077b6;
  margin-bottom:20px;
}

.success{
  background:#d4edda;
  color:#155724;
  padding:12px;
  border-radius:10px;
  margin-bottom:20px;
  text-align:center;
  font-weight:bold;
}

label {
  display: block;
  font-weight: bold;
  color: #0077b6;
  margin-bottom: 5px;
  font-size: 14px;
}

input,
select,
textarea{
  width:100%;
  padding:12px 15px;
  margin-bottom:15px;
  border:1px solid #ddd;
  border-radius:10px;
  font-size:15px;
}

.payment-group {
  display: flex;
  gap: 10px;
}

.payment-group select {
  flex: 1;
}

.payment-group input {
  flex: 2;
}

button{
  width:100%;
  padding:15px;
  background:linear-gradient(90deg,#00b4db,#0077b6);
  border:none;
  border-radius:10px;
  color:white;
  font-size:18px;
  font-weight:bold;
  cursor:pointer;
  margin-top:10px;
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

  <div class="left">
    <h1>Book Your Appointment</h1>
    <p>
      Our hospital provides high-quality healthcare with experienced doctors,
      modern medical equipment, and professional patient care.
      Book your appointment and complete your payment easily.
    </p>

    <div class="feature">✔ Experienced Doctors</div>
    <div class="feature">✔ Emergency Care</div>
    <div class="feature">✔ Modern Equipment</div>
    <div class="feature">✔ Online Booking & Payment</div>
  </div>

  <div class="right">
    <h2>Appointment & Payment</h2>

    <?php
    if($message != ""){
      echo "<div class='success'>$message</div>";
    }
    ?>

    <form method="POST">

      <input 
        type="text" 
        name="fullname" 
        placeholder="Full Name" 
        pattern="[A-Za-z\s]+" 
        title="Full Name must contain letters and spaces only" 
        oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '')" 
        required>

      <input type="email" name="email" placeholder="Email Address" required>

      <input type="text" name="phone" placeholder="Phone Number" required>

      <select name="doctor" required>
        <option value="">Select Doctor</option>
        <option>Dr. Amina Mohamed</option>
        <option>Dr. Fatima Ali</option>
        <option>Dr. Maryan Hassan</option>
      </select>

      <select name="department" required>
        <option value="">Select Department</option>
        <option>Cardiology</option>
        <option>General Medicine</option>
        <option>Pediatrics</option>
        <option>Orthopedics</option>
      </select>

      <label>Date & Time:</label>
      <input type="date" name="date" required>
      <input type="time" name="time" required>

      <label>Payment Amount & Currency:</label>
      <div class="payment-group">
        <select name="currency" required>
          <option value="USD">USD ($)</option>
          <option value="Shilling">Shilling</option>
        </select>
        <input type="number" step="0.01" name="amount" placeholder="Amount" required>
      </div>

      <label>Payment Method:</label>
      <select name="payment_method" required>
        <option value="">Select Payment Method</option>
        <option value="ZAAD Service">ZAAD Service</option>
        <option value="E-DAHAB">E-DAHAB</option>
        <option value="DAHAB PLUS">DAHAB PLUS</option>
      </select>

      <textarea name="notes" rows="3" placeholder="Symptoms or Notes"></textarea>

      <button type="submit" name="book">
        Book Appointment & Pay
      </button>

    </form>
  </div>

</div>

</body>
</html>