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
$original_patient = $_GET['patient'] ?? '';

// Update record when form is submitted using patient name
if (isset($_POST['update'])) {
    $patient = $_POST['patient'];
    $room = $_POST['room'];
    $date_in = $_POST['date_in'];
    $date_out = $_POST['date_out'];
    $currency = $_POST['currency'];
    $amount = $_POST['amount'];
    $payment_method = $_POST['payment_method'];
    $hidden_original = $_POST['hidden_original'];

    $update_sql = "UPDATE booking SET patient=?, room=?, date_in=?, date_out=?, currency=?, amount=?, payment_method=? WHERE patient=?";
    $stmt = $conn->prepare($update_sql);
    $stmt->bind_param("sssssdsi", $patient, $room, $date_in, $date_out, $currency, $amount, $payment_method, $hidden_original);
    // Xusuusin: Haddii ay khalad bind parameters ka timaado isticmaal xalkan hoose (dhammaan string haddii amount-ka dhib keenayo):
    // $stmt->bind_param("ssssssss", $patient, $room, $date_in, $date_out, $currency, $amount, $payment_method, $hidden_original);

    if ($stmt->execute()) {
        $message = "Booking updated successfully! <a href='report.php'>View Report</a>";
        $original_patient = $patient; // Cusbooneysii magaca haddii la beddelay
    } else {
        $message = "Update failed: " . $conn->error;
    }
    $stmt->close();
}

// Fetch existing data using patient name
$sql = "SELECT * FROM booking WHERE patient = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $original_patient);
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
<title>Edit Room Booking</title>
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
    width: 500px;
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
    text-decoration: underline;
}
</style>
</head>
<body>

<div class="container">
    <h2>Edit Room Booking</h2>

    <?php if($message != ""): ?>
        <div class='success'><?php echo $message; ?></div>
    <?php endif; ?>

    <?php if($row): ?>
    <form method="POST">
        <!-- Hidden field si loo xafido magaca hore xitaa haddii la beddelayo -->
        <input type="hidden" name="hidden_original" value="<?php echo htmlspecialchars($original_patient); ?>">

        <label>Patient Name:</label>
        <input type="text" name="patient" value="<?php echo htmlspecialchars($row['patient']); ?>" required>

        <label>Room Type:</label>
        <select name="room" required>
            <option value="General Ward" <?php if($row['room']=='General Ward') echo 'selected'; ?>>General Ward</option>
            <option value="Private Room" <?php if($row['room']=='Private Room') echo 'selected'; ?>>Private Room</option>
            <option value="ICU Bed" <?php if($row['room']=='ICU Bed') echo 'selected'; ?>>ICU Bed</option>
        </select>

        <label>Check-in Date:</label>
        <input type="date" name="date_in" value="<?php echo $row['date_in']; ?>" required>

        <label>Check-out Date:</label>
        <input type="date" name="date_out" value="<?php echo $row['date_out']; ?>" required>

        <label>Currency & Amount:</label>
        <div class="payment-group">
            <select name="currency" required>
                <option value="USD" <?php if($row['currency']=='USD') echo 'selected'; ?>>USD ($)</option>
                <option value="Shilling" <?php if($row['currency']=='Shilling') echo 'selected'; ?>>Shilling</option>
            </select>
            <input type="number" step="0.01" name="amount" value="<?php echo $row['amount']; ?>" required>
        </div>

        <label>Payment Method:</label>
        <select name="payment_method" required>
            <option value="ZAAD Service" <?php if($row['payment_method']=='ZAAD Service') echo 'selected'; ?>>ZAAD Service</option>
            <option value="E-DAHAB" <?php if($row['payment_method']=='E-DAHAB') echo 'selected'; ?>>E-DAHAB</option>
            <option value="DAHAB PLUS" <?php if($row['payment_method']=='DAHAB PLUS') echo 'selected'; ?>>DAHAB PLUS</option>
        </select>

        <button type="submit" name="update">Update Booking</button>
    </form>
    <?php else: ?>
        <p style="text-align:center; color:red;">Booking record not found!</p>
    <?php endif; ?>

    <a href="report.php" class="btn-back">Back to Report</a>
</div>

</body>
</html>