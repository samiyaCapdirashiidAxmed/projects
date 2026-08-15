<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "software_project_management2";

$con = new mysqli($servername, $username, $password, $dbname);

if($con->connect_error){
    die("Connection Failed: ".$con->connect_error);
}

// Search
if(isset($_POST['btnsearch'])){

    $search = $con->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM appointments WHERE   fullname LIKE '%$search%'";

}else{

    $sql = "SELECT * FROM appointments";

}

$result = $con->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Hospital Booking Report</title>

<style>
/* Reset */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
}

body{
    font-family:Arial, Helvetica, sans-serif;
    background:#f4f7fb;
    padding:30px;
}

/* Container */
.container{
    width:95%;
    max-width:1200px;
    margin:auto;
    background:#fff;
    padding:25px;
    border-radius:12px;
    box-shadow:0 5px 15px rgba(141, 108, 108, 0.2);
}

/* Heading */
h1{
    text-align:center;
    color:#0d6efd;
    margin-bottom:25px;
}

/* Search Box */
.search-box{
    display:flex;
    justify-content:center;
    gap:10px;
    margin-bottom:25px;
    flex-wrap:wrap;
}

.search-box input{
    width:320px;
    padding:12px;
    border:1px solid #ccc;
    border-radius:6px;
    font-size:16px;
}

.btnsearch{
    background:#0d6efd;
    color:#fff;
    border:none;
    padding:12px 20px;
    border-radius:6px;
    cursor:pointer;
    font-size:16px;
}

.btnsearch:hover{
    background:#0b5ed7;
}

.back{
    text-decoration:none;
    background:#6c757d;
    color:white;
    padding:12px 20px;
    border-radius:6px;
}

.back:hover{
    background:#5c636a;
}

/* Table */
table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table th{
    background:#0d6efd;
    color:white;
    padding:14px;
    border:1px solid #ddd;
}

table td{
    padding:12px;
    border:1px solid #ddd;
    text-align:center;
}

table tr:nth-child(even){
    background:#f8f9fa;
}

table tr:hover{
    background:#dbeafe;
}

/* Buttons */
.btn,
.print-btn{
    display:inline-block;
    margin-top:25px;
    padding:12px 20px;
    border-radius:6px;
    text-decoration:none;
    font-size:16px;
    cursor:pointer;
    border:none;
}

.btn{
    background:#198754;
    color:white;
}

.btn:hover{
    background:#157347;
}

.print-btn{
    background:#fd7e14;
    color:white;
    float:right;
}

.print-btn:hover{
    background:#e76b00;
}

/* Print */
@media print{

    .search-box,
    .btn,
    .print-btn{
        display:none;
    }

    body{
        background:white;
        padding:0;
    }

    .container{
        box-shadow:none;
        width:100%;
    }
}

/* Mobile */
@media(max-width:768px){

    table{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }

    .print-btn,
    .btn{
        width:100%;
        margin-top:15px;
        float:none;
        text-align:center;
    }
}


</style>

</head>
<body>

<div class="container">

<h1>🏥 Hospital  Report</h1>

<form method="POST" class="search-box">

    <input
        type="text"
        name="search"
        placeholder="Enter Patient Name"
        value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">

    <button type="submit" name="btnsearch" class="btnsearch">
        🔍 Search
    </button>
    
    <a href="report1.php" class="back">
        🔄 Reset
</a>

</form>

<table>

 <th>Name</th><th>Email</th><th>Phone</th><th>Doctor</th>
                <th>Department</th><th>Date</th><th>Time</th>



 <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>{$row['fullname']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['doctor']}</td>
                        <td>{$row['department']}</td>
                        <td>{$row['date']}</td
                        ><td>{$row['time']}</td>
                    </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No appointments found.</td></tr>";
            }
           

   

?>

</table>

<a href="appoiment.php" class="btn">⬅ Back To appoiment</a>

<button class="print-btn" onclick="window.print()">
🖨 Print Report
</button>

</div>

</body>
</html>

<?php
$con->close();
?>