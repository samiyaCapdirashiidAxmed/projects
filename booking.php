<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software_project_management1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$message = "";

// When the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $patient = $_POST['patient'];
    $room = $_POST['room'];
    $date_in = $_POST['date_in'];
    $date_out = $_POST['date_out'];
    $currency = $_POST['currency'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];

    // Insert booking into database
    $sql = "INSERT INTO booking (patient, room, date_in, date_out, currency, amount, payment_method)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssds", $patient, $room, $date_in, $date_out, $currency, $amount, $payment_method);

    if ($stmt->execute()) {
        $message = "<p class='success'>Room booked and payment recorded successfully!</p>";
    } else {
        $message = "<p class='error'>Booking failed! Error: " . $conn->error . "</p>";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Room Booking & Payment</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #89c5f4 0%, #8d9be9 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 20px 0;
    }
    .booking-container {
      background: rgba(248, 244, 244, 0.95);
      padding: 40px;
      border-radius: 16px;
      box-shadow: 0 12px 30px rgba(0,0,0,0.3);
      width: 450px;
      text-align: center;
      animation: fadeIn 1.2s ease-in-out;
    }
    .booking-container h1 {
      margin-bottom: 25px;
      color: #2c3e50;
      font-size: 26px;
    }
    form label {
      display: block;
      text-align: left;
      font-weight: 600;
      color: #34495e;
      margin-top: 10px;
      margin-bottom: 4px;
      font-size: 14px;
    }
    form input, form select, form button {
      width: 100%;
      padding: 12px;
      margin-bottom: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 15px;
      box-sizing: border-box;
      transition: 0.3s;
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
    form input:focus, form select:focus {
      border-color: #3498db;
      box-shadow: 0 0 8px rgba(52, 152, 219, 0.6);
      outline: none;
    }
    form button {
      background: linear-gradient(135deg, #27ae60, #2ecc71);
      color: white;
      border: none;
      cursor: pointer;
      font-weight: bold;
      margin-top: 15px;
    }
    form button:hover {
      background: linear-gradient(135deg, #2ecc71, #27ae60);
      transform: scale(1.02);
    }
    .success {
      color: #27ae60;
      font-weight: bold;
      margin-bottom: 15px;
    }
    .error {
      color: #e74c3c;
      font-weight: bold;
      margin-bottom: 15px;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="booking-container">
    <h1>🏥 Hospital Room Booking</h1>
    <?php if (!empty($message)) echo $message; ?>
    
    <form method="POST">
      <input type="text" name="patient" placeholder="Patient Name" required>
      
      <select name="room" required>
        <option value="">Select Room Type</option>
        <option value="General Ward">General Ward</option>
        <option value="Private Room">Private Room</option>
        <option value="ICU Bed">ICU Bed</option>
      </select>
      
      <label for="date_in">Check-in Date:</label>
      <input type="date" id="date_in" name="date_in" required>
      
      <label for="date_out">Check-out Date:</label>
      <input type="date" id="date_out" name="date_out" required>
      
      <label>Payment Amount & Currency:</label>
      <div class="payment-group">
        <select name="currency" required>
          <option value="USD">USD ($)</option>
          <option value="Shilling">Shilling</option>
        </select>
        <input type="number" step="0.01" name="amount" placeholder="Amount" required>
      </div>

      <label for="payment_method">Payment Method:</label>
      <select name="payment_method" id="payment_method" required>
        <option value="">Select Payment Method</option>
        <option value="ZAAD Service">ZAAD Service</option>
        <option value="E-DAHAB">E-DAHAB</option>
        <option value="DAHAB PLUS">DAHAB PLUS</option>
      </select>
      
      <button type="submit">Complete Booking & Payment</button>
    </form>
  </div>
</body>
</html>