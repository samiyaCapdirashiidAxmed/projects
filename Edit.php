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
$original_name = $_GET['fullname'] ?? '';

// Update record when form is submitted using fullname
if (isset($_POST['update'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $doctor = $_POST['doctor'];
    $department = $_POST['department'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $currency = $_POST['currency'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $hidden_original = $_POST['hidden_original'];

    $update_sql = "UPDATE appointments SET fullname=?, email=?, phone=?, doctor=?, department=?, date=?, time=?, currency=?, amount=?, payment_method=? WHERE fullname=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssssdsss", $fullname, $email, $phone, $doctor, $department, $date, $time, $currency, $amount, $payment_method, $hidden_original);

    if ($stmt->execute()) {
        $message = "Appointment updated successfully! <a href='report1.php'>View Report</a>";
        $original_name = $fullname;
    } else {
        $message = "Update failed: " . $conn->error;
    }
    $stmt->close();
}

// Fetch existing data using fullname
$sql = "SELECT * FROM appointments WHERE fullname = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $original_name);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Appointment</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f8f9fa;
    padding: 40px;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    width: 600px;
    background: #ffffff;
    padding: 30px;
    border: 1px solid #dee2e6;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
}

h2 {
    color: #333333;
    margin-bottom: 20px;
    text-align: center;
    font-size: 22px;
}

label {
    display: block;
    font-weight: bold;
    color: #495057;
    margin-bottom: 6px;
    font-size: 14px;
}

input, select {
    width: 100%;
    padding: 10px 12px;
    margin-bottom: 15px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 14px;
    background-color: #fff;
    color: #495057;
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

input:focus, select:focus {
    outline: none;
    border-color: #80bdff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

button {
    width: 100%;
    padding: 12px;
    background-color: #007bff;
    border: none;
    border-radius: 6px;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.2s;
}

button:hover {
    background-color: #0056b3;
}

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 10px;
    border-radius: 6px;
    margin-bottom: 20px;
    text-align: center;
    font-size: 14px;
    font-weight: bold;
}

.btn-back {
    display: block;
    text-align: center;
    margin-top: 15px;
    color: #6c757d;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
}

.btn-back:hover {
    color: #343a40;
    text-decoration: underline;
}
</style>
</head>
<body>

<div class="container">
    <h2>Edit Appointment</h2>

    <?php if($message != ""): ?>
        <div class='success'><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if($row): ?>
    <form method="POST">
        <!-- Hidden field to keep track of the original name even if the user changes it -->
        <input type="hidden" name="hidden_original" value="<?php echo htmlspecialchars($original_name); ?>">

        <label>Full Name:</label>
        <input type="text" name="fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>" required>

        <label>Email Address:</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

        <label>Phone Number:</label>
        <input type="text" name="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required>

        <label>Doctor:</label>
        <select name="doctor" required>
            <option <?php if($row['doctor']=='Dr. Amina Mohamed') echo 'selected'; ?>>Dr. Amina Mohamed</option>
            <option <?php if($row['doctor']=='Dr. Fatima Ali') echo 'selected'; ?>>Dr. Fatima Ali</option>
            <option <?php if($row['doctor']=='Dr. Maryan Hassan') echo 'selected'; ?>>Dr. Maryan Hassan</option>
        </select>

        <label>Department:</label>
        <select name="department" required>
            <option <?php if($row['department']=='Cardiology') echo 'selected'; ?>>Cardiology</option>
            <option <?php if($row['department']=='General Medicine') echo 'selected'; ?>>General Medicine</option>
            <option <?php if($row['department']=='Pediatrics') echo 'selected'; ?>>Pediatrics</option>
            <option <?php if($row['department']=='Orthopedics') echo 'selected'; ?>>Orthopedics</option>
        </select>

        <label>Date:</label>
        <input type="date" name="date" value="<?php echo $row['date']; ?>" required>

        <label>Time:</label>
        <input type="time" name="time" value="<?php echo $row['time']; ?>" required>

        <label>Payment Amount & Currency:</label>
        <div class="payment-group">
            <select name="currency" required>
                <option value="USD" <?php if(isset($row['currency']) && $row['currency']=='USD') echo 'selected'; ?>>USD ($)</option>
                <option value="Shilling" <?php if(isset($row['currency']) && $row['currency']=='Shilling') echo 'selected'; ?>>Shilling</option>
            </select>
            <input type="number" step="0.01" name="amount" value="<?php echo htmlspecialchars($row['amount'] ?? ''); ?>" placeholder="Amount" required>
        </div>

        <label>Payment Method:</label>
        <select name="payment_method" required>
            <option value="">Select Payment Method</option>
            <option value="ZAAD Service" <?php if(isset($row['payment_method']) && $row['payment_method']=='ZAAD Service') echo 'selected'; ?>>ZAAD Service</option>
            <option value="E-DAHAB" <?php if(isset($row['payment_method']) && $row['payment_method']=='E-DAHAB') echo 'selected'; ?>>E-DAHAB</option>
            <option value="DAHAB PLUS" <?php if(isset($row['payment_method']) && $row['payment_method']=='DAHAB PLUS') echo 'selected'; ?>>DAHAB PLUS</option>
        </select>

        <button type="submit" name="update">Update Appointment</button>
    </form>
    <?php else: ?>
        <p style="text-align:center; color:red;">Record not found!</p>
    <?php endif; ?>

    <a href="report.php" class="btn-back">Back to Report</a>
</div>

</body>
</html>