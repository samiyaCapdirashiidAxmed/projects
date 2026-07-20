<?php
include("conection.php");

$search = "";

if(isset($_GET['search'])){

    $search = mysqli_real_escape_string($con, $_GET['search']);

    $sql = "SELECT * FROM registration1
            WHERE fullname LIKE '%$search%'
            OR username LIKE '%$search%'";

}else{

    $sql = "SELECT * FROM registration1";

}

$result = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Patient Report</title>

<style>
body{
    font-family:Arial,sans-serif;
    background:#f4f4f4;
    margin:0;
}

.container{
    width:95%;
    margin:30px auto;
    background:#fff;
    padding:20px;
    border-radius:10px;
    box-shadow:0 0 10px #ccc;
}

h2{
    text-align:center;
    color:#000080;
}

.search-box{
    text-align:center;
    margin-bottom:20px;
}

.search-box input{
    width:300px;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

table th,
table td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

table th{
    background:#000080;
    color:#fff;
}

tr:nth-child(even){
    background:#f2f2f2;
}

.back{
    display:inline-block;
    padding:10px 20px;
    background:#000080;
    color:white;
    text-decoration:none;
    border-radius:5px;
    margin-top:20px;
}

.print-btn{
    background:#28a745;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-size:16px;
}

.print-btn:hover{
    background:#218838;
}

@media print{
    .print-btn,
    .back,
    .search-box{
        display:none;
    }
}
</style>

</head>

<body>

<div class="container">

<h2>Patient Registration Report</h2>


<!-- SEARCH -->
<div class="search-box">

<form method="GET">

<input type="text"
       name="search"
       placeholder="Search by Full Name or Username"
       value="<?php echo htmlspecialchars($search); ?>">

<button type="submit" class="print-btn">
🔍 Search
</button>

<a href="report2.php" class="back">
Reset
</a>

</form>

</div>


<table>

<tr>
<th>Full Name</th>
<th>Username</th>
<th>Email</th>
<th>Phone</th>
<th>Gender</th>
<th>Age</th>
</tr>


<?php

if(mysqli_num_rows($result) > 0){

while($row = mysqli_fetch_assoc($result)){

?>

<tr>

<td><?php echo $row['fullname']; ?></td>
<td><?php echo $row['username']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['age']; ?></td>

</tr>

<?php

}

}else{

echo "<tr><td colspan='6'>No Patient Found</td></tr>";

}

?>

</table>


<a href="report.php" class="back">
Back REPORT
</a>


<button class="print-btn" onclick="window.print()">
🖨 Print Report
</button>


</div>

</body>
</html>