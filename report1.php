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

// Handle Delete Request by Full Name
if (isset($_GET['delete'])) {
    $fullname_to_delete = $_GET['delete'];
    $del_sql = "DELETE FROM appointments WHERE fullname = ?";
    $stmt = $conn->prepare($del_sql);
    $stmt->bind_param("s", $fullname_to_delete);
    if ($stmt->execute()) {
        $message = "Appointment deleted successfully!";
    }
    $stmt->close();
}

// Handle Search Query
$search = "";
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $sql = "SELECT * FROM appointments WHERE fullname LIKE ? OR phone LIKE ? ORDER BY fullname DESC";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM appointments ORDER BY fullname DESC";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Appointment Report & Management</title>
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial,sans-serif;
}
body{
    background:#f4f7f6;
    padding:30px;
}
.container{
    max-width:1300px;
    margin:0 auto;
    background:#fff;
    padding:30px;
    border-radius:15px;
    box-shadow:0 10px 30px rgba(0,0,0,.1);
}
h2{
    color:#0077b6;
    margin-bottom:20px;
    text-align:center;
}
.top-controls{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
    flex-wrap:wrap;
    gap:10px;
}
.search-form {
    display:flex;
    gap:10px;
}
.search-form input {
    padding:10px;
    width:250px;
    border:1px solid #ddd;
    border-radius:8px;
    font-size:14px;
}
.btn {
    padding:10px 15px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    font-weight:bold;
    text-decoration:none;
    color:white;
    font-size:14px;
}
.btn-primary { background:#0077b6; }
.btn-success { background:#28a745; }
.btn-danger { background:#dc3545; }
.btn-secondary { background:#6c757d; }
.btn:hover { opacity:.9; }

.success{
    background:#d4edda;
    color:#155724;
    padding:12px;
    border-radius:8px;
    margin-bottom:20px;
    text-align:center;
    font-weight:bold;
}
table{
    width:100%;
    border-collapse:collapse;
    margin-top:10px;
}
th, td{
    padding:12px 10px;
    text-align:left;
    border-bottom:1px solid #ddd;
    font-size:13px;
}
th{
    background:#0077b6;
    color:white;
}
tr:hover{
    background:#f1f9fc;
}
.actions{
    display:flex;
    gap:5px;
}
@media print {
    .top-controls, .actions, .btn {
        display: none !important;
    }
    body {
        background: white;
        padding: 0;
    }
    .container {
        box-shadow: none;
        padding: 0;
    }
}
</style>
</head>
<body>

<div class="container">
    <h2>Hospital Appointments Report</h2>

    <?php if($message != ""): ?>
        <div class='success'><?php echo $message; ?></div>
    <?php endif; ?>

    <div class="top-controls">
        <form method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by name or phone..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
            <?php if(!empty($search)): ?>
                <a href="report.php" class="btn btn-secondary">Reset</a>
            <?php endif; ?>
        </form>

        <div>
            <button onclick="window.print()" class="btn btn-success">Print Report</button>
            <a href="index.php" class="btn btn-secondary">Back to Booking</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Date & Time</th>
                <th>Amount</th>
                <th>Method</th>
                <th class="actions-col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['fullname']); ?></td>
                        <td><?php echo htmlspecialchars($row['phone']); ?></td>
                        <td><?php echo htmlspecialchars($row['email']); ?></td>
                        <td><?php echo htmlspecialchars($row['doctor']); ?></td>
                        <td><?php echo htmlspecialchars($row['department']); ?></td>
                        <td><?php echo $row['date'] . ' ' . $row['time']; ?></td>
                        <td><?php echo $row['amount'] . ' ' . $row['currency']; ?></td>
                        <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                        <td class="actions">
                            <a href="edit.php?fullname=<?php echo urlencode($row['fullname']); ?>" class="btn btn-primary" style="padding:6px 10px; font-size:12px;">Edit</a>
                            <a href="report.php?delete=<?php echo urlencode($row['fullname']); ?>" class="btn btn-danger" style="padding:6px 10px; font-size:12px;" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="9" style="text-align:center; padding:20px; color:#777;">No records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php $conn->close(); ?>