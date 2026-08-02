<?php
include("conection.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Doctor Report</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
        }
        h2{
            text-align:center;
            color:#0066cc;
        }
        table{
            width:90%;
            margin:20px auto;
            border-collapse:collapse;
            background:white;
        }
        th, td{
            border:1px solid #ccc;
            padding:10px;
            text-align:center;
        }
        th{
            background:#0066cc;
            color:white;
        }
        tr:nth-child(even){
            background:#f2f2f2;
        }
    </style>
</head>
<body>

<h2>Doctor Report</h2>

<table>
<tr>
    <th>fullname</th>
    <th>Specialization</th>
    <th>Phone</th>
    <th>Email</th>
     <th>Password</th>
    <th>Bio</th>
        <th>address</th>

</tr>

<?php
$sql = "SELECT * FROM doctor";
$result = mysqli_query($con, $sql);

while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['fullname']; ?></td>
    <td><?php echo $row['specialization']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['email']; ?></td>
 <td><?php echo $row['password']; ?></td>
    <td><?php echo $row['bio']; ?></td>
    <td><?php echo $row['address']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>