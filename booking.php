<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software_project_management1"; // Change this to your database name

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

    // Insert booking into database
    $sql = "INSERT INTO booking (patient, room, date_in, date_out)
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $patient, $room, $date_in, $date_out);

    if ($stmt->execute()) {
        $message = "<p class='success'>Room booked successfully!</p>";
    } else {
        $message = "<p class='error'>Booking failed!</p>";
    }

    $stmt->close();
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Hospital Room Booking</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .booking-container {
      background: rgba(255, 255, 255, 0.95);
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
      font-size: 28px;
    }
    form input, form select, form button {
      width: 100%;
      padding: 14px;
      margin: 12px 0;
      border-radius: 10px;
      border: 1px solid #ccc;
      font-size: 16px;
      transition: 0.3s;
    }
    form input:focus, form select:focus {
      border-color: #3498db;
      box-shadow: 0 0 8px rgba(52, 152, 219, 0.6);
    }
    form button {
      background: linear-gradient(135deg, #3498db, #2980b9);
      color: white;
      border: none;
      cursor: pointer;
      font-weight: bold;
    }
    form button:hover {
      background: linear-gradient(135deg, #2980b9, #1f618d);
      transform: scale(1.05);
    }
    .success {
      color: green;
      font-weight: bold;
      margin-top: 15px;
    }
    .error {
      color: red;
      font-weight: bold;
      margin-top: 15px;
    }
    @keyframes fadeIn {
      from {opacity: 0; transform: translateY(-20px);}
      to {opacity: 1; transform: translateY(0);}
    }
  </style>
</head>
<body>
  <div class="booking-container">
    <h1>🏥 Book a Hospital Room</h1>
    <?php if (!empty($message)) echo $message; ?>
    <form method="POST">
      <input type="text" name="patient" placeholder="Patient Name" required>
      <select name="room" required>
        <option value="">Select Room Type</option>
        <option value="General Ward">General Ward</option>
        <option value="Private Room">Private Room</option>
        <option value="ICU Bed">ICU Bed</option>
      </select>
      <label>Check-in Date:</label>
      <input type="date" name="date_in" required>
      <label>Check-out Date:</label>
      <input type="date" name="date_out" required>
      <button type="submit">Book Room</button>
    </form>
  </div>
</body>
</html>
