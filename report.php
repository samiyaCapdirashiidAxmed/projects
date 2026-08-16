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

// Handle Delete Request by patient name
if (isset($_GET['delete'])) {
    $patient_to_delete = $_GET['delete'];
    $del_sql = "DELETE FROM booking WHERE patient = ?";
    $stmt = $conn->prepare($del_sql);
    $stmt->bind_param("s", $patient_to_delete);
    if ($stmt->execute()) {
        $message = "Booking deleted successfully!";
    }
    $stmt->close();
}

// Handle Search Query
$search = "";
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $sql = "SELECT * FROM booking WHERE patient LIKE ? OR room LIKE ? ORDER BY patient DESC";
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $search . "%";
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $sql = "SELECT * FROM booking ORDER BY patient DESC";
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital Room Booking Report</title>
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background-color: #f8f9fa;
    padding: 30px;
}

.container {
    max-width: 1200px;
    margin: 0 auto;
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
    font-size: 24px;
}

.top-controls {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    flex-wrap: wrap;
    gap: 10px;
}

.search-form {
    display: flex;
    gap: 10px;
}

.search-form input {
    padding: 10px 12px;
    width: 250px;
    border: 1px solid #ced4da;
    border-radius: 6px;
    font-size: 14px;
}

.btn {
    padding: 10px 15px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    text-decoration: none;
    color: white;
    font-size: 14px;
    display: inline-block;
}

.btn-primary { background-color: #007bff; }
.btn-primary:hover { background-color: #0056b3; }

.btn-success { background-color: #28a745; }
.btn-success:hover { background-color: #218838; }

.btn-danger { background-color: #dc3545; }
.btn-danger:hover { background-color: #c82333; }

.btn-secondary { background-color: #6c757d; }
.btn-secondary:hover { background-color: #5a6268; }

.success {
    background-color: #d4edda;
    color: #155724;
    border: 1px solid #c3e6cb;
    padding: 12px;
    border-radius: 6px;
    margin-bottom: 20px;
    text-align: center;
    font-weight: bold;
    font-size: 14px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

th, td {
    padding: 12px 10px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
    font-size: 14px;
    color: #495057;
}

th {
    background-color: #343a40;
    color: white;
}

tr:hover {
    background-color: #f1f3f5;
}

.actions {
    display: flex;
    gap: 5px;
}

@media print {
    .top-controls, .actions-col, .actions, .btn {
        display: none !important;
    }
    body {
        background: white;
        padding: 0;
    }
    .container {
        border: none;
        box-shadow: none;
        padding: 0;
    }
}
</style>
</head>
<body>

<div class="container">
    <h2>Hospital Room Booking Report</h2>

    <?php if($message != ""): ?>
        <div class='success'><?php echo $message; ?></div>
    <?php endif; ?>

    <div class="top-controls">
        <form method="GET" class="search-form">
            <input type="text" name="search" placeholder="Search by patient or room..." value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit" class="btn btn-primary">Search</button>
            <?php if(!empty($search)): ?>
                <a href="report.php" class="btn btn-secondary">Reset</a>
            <?php endif; ?>
        </form>

        <div>
            <button onclick="window.print()" class="btn btn-success">Print Report</button>
            <a href="booking.php" class="btn btn-secondary">New Booking</a>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Room Type</th>
                <th>Check-in</th>
                <th>Check-out</th>
                <th>Amount</th>
                <th>Payment Method</th>
                <th class="actions-col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['patient']); ?></td>
                        <td><?php echo htmlspecialchars($row['room']); ?></td>
                        <td><?php echo htmlspecialchars($row['date_in']); ?></td>
                        <td><?php echo htmlspecialchars($row['date_out']); ?></td>
                        <td><?php echo htmlspecialchars($row['amount'] . ' ' . $row['currency']); ?></td>
                        <td><?php echo htmlspecialchars($row['payment_method']); ?></td>
                        <td class="actions actions-col">
                            <!-- Waxaa loo gudbinayaa magaca bukaanka halkii ay ahaan lahayd id -->
                            <a href="editing.php?patient=<?php echo urlencode($row['patient']); ?>" class="btn btn-primary" style="padding: 6px 10px; font-size: 12px;">Edit</a>
                            <a href="report.php?delete=<?php echo urlencode($row['patient']); ?>" class="btn btn-danger" style="padding: 6px 10px; font-size: 12px;" onclick="return confirm('Are you sure you want to delete this booking?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align:center; padding: 20px; color: #6c757d;">No booking records found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>
<?php $conn->close(); ?>