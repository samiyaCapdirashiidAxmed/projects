<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software_project_management1";

$con = new mysqli($servername, $username, $password, $dbname);

if($con->connect_error){
    die("Connection Failed: ".$con->connect_error);
}

// Search
if(isset($_POST['btnsearch'])){

    $search = $con->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM booking WHERE patient LIKE '%$search%'";

}else{

    $sql = "SELECT * FROM booking";

}

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hospital Booking Report</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:'Segoe UI',sans-serif;
    background:#ffffff;
    min-height:100vh;
    padding:40px;
}

.container{
    width:95%;
    max-width:1200px;
    margin:auto;
    background:#fff;
    border-radius:15px;
    padding:30px;
    box-shadow:0 10px 25px rgba(0,0,0,.15);
}

h1{
    text-align:center;
    color:#0d6efd;
    margin-bottom:25px;
}

.search-box{
    display:flex;
    justify-content:center;
    gap:10px;
    margin-bottom:20px;
}

.search-box input{
    padding:10px;
    width:250px;
    border:1px solid #0d6efd;
    border-radius:5px;
}

.btnsearch{
    background:#0d6efd;
    color:#fff;
    border:none;
    padding:10px 20px;
    border-radius:5px;
    cursor:pointer;
}

.btnsearch:hover{
    background:#0b5ed7;
}

table{
    width:100%;
    border-collapse:collapse;
}

table th{
    background:#0d6efd;
    color:#fff;
    padding:15px;
}

table td{
    padding:14px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

table tr:nth-child(even){
    background:#f8f9fa;
}

table tr:hover{
    background:#d6ecff;
}

.btn{
    display:inline-block;
    margin-top:20px;
    padding:12px 25px;
    background:#0d6efd;
    color:#fff;
    text-decoration:none;
    border-radius:8px;
    font-weight:bold;
}

.btn:hover{
    background:#0b5ed7;
}

.print{
    border:none;
    cursor:pointer;
    margin-left:10px;
}

.btnreset{
    background:#6c757d;
    color:#fff;
    border:none;
    padding:10px 20px;
    border-radius:5px;
    cursor:pointer;
}

.btnreset:hover{
    background:#5a6268;
}

</style>

</head>
<body>

<div class="container">

<h1>🏥 Hospital Room Booking Report</h1>

<form method="POST" class="search-box">

    <input
        type="text"
        name="search"
        placeholder="Enter Patient Name"
        value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">

    <button type="submit" name="btnsearch" class="btnsearch">
        🔍 Search
    </button>
    <button type="button" class="btnreset" onclick="window.location='report.php'">
        🔄 Reset
    </button>

</form>

<table>

<tr>
    <th>Patient Name</th>
    <th>Room Type</th>
    <th>Check In</th>
    <th>Check Out</th>
</tr>

<?php

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

?>

<tr>

    <td><?php echo $row['patient']; ?></td>
    <td><?php echo $row['room']; ?></td>
    <td><?php echo $row['date_in']; ?></td>
    <td><?php echo $row['date_out']; ?></td>

</tr>

<?php

    }

}else{

    echo "<tr><td colspan='4'>No Booking Records Found</td></tr>";

}

?>

</table>

<a href="booking.php" class="btn">⬅ Back To Booking</a>

<button type="button" class="btn print" onclick="window.print()">
🖨 Print Report
</button>

</div>

</body>
</html>

<?php
$con->close();
?>