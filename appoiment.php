<?php
$message="";

if(isset($_POST['book'])){
    $message="Your appointment has been booked successfully!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Doctor Appointment Booking</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial,sans-serif;
}

body{
background:
linear-gradient(rgba(0,40,80,.60),rgba(0,40,80,.60)),
url('hospital.jpg');
background-size:cover;
background-position:center;
background-attachment:fixed;
min-height:100vh;
display:flex;
justify-content:center;
align-items:center;
padding:40px;
}

.container{
width:1100px;
display:grid;
grid-template-columns:1fr 1fr;
background:#fff;
border-radius:25px;
overflow:hidden;
box-shadow:0 20px 50px rgba(0,0,0,.3);
}

.left{
background:linear-gradient(135deg,#0077b6,#00b4d8);
color:white;
padding:50px;
}

.left h1{
font-size:40px;
margin-bottom:20px;
}

.left p{
line-height:1.9;
margin-bottom:20px;
}

.feature{
background:rgba(255,255,255,.15);
padding:15px;
border-radius:12px;
margin-top:15px;
}

.right{
padding:50px;
}

.right h2{
text-align:center;
color:#0077b6;
margin-bottom:20px;
}

.success{
background:#d4edda;
color:#155724;
padding:12px;
border-radius:10px;
margin-bottom:20px;
text-align:center;
font-weight:bold;
}

input,
select,
textarea{
width:100%;
padding:15px;
margin-bottom:15px;
border:1px solid #ddd;
border-radius:10px;
font-size:16px;
}

button{
width:100%;
padding:15px;
background:linear-gradient(90deg,#00b4db,#0077b6);
border:none;
border-radius:10px;
color:white;
font-size:18px;
font-weight:bold;
cursor:pointer;
}

button:hover{
opacity:.9;
}

@media(max-width:900px){
.container{
grid-template-columns:1fr;
}
}

</style>
</head>

<body>

<div class="container">

<div class="left">

<h1>Book Your Appointment</h1>

<p>
Our hospital provides high-quality healthcare with experienced doctors,
modern medical equipment, and professional patient care.
Book your appointment quickly and easily.
</p>

<div class="feature">✔ Experienced Doctors</div>
<div class="feature">✔ Emergency Care</div>
<div class="feature">✔ Modern Equipment</div>
<div class="feature">✔ Online Appointment Booking</div>

</div>

<div class="right">

<h2>Appointment Booking</h2>

<?php
if($message!=""){
echo "<div class='success'>$message</div>";
}
?>

<form method="POST">

<input type="text" name="fullname" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email Address" required>

<input type="text" name="phone" placeholder="Phone Number" required>

<select name="doctor" required>
<option value="">Select Doctor</option>
<option>Dr. Amina Mohamed</option>
<option>Dr. Fatima Ali</option>
<option>Dr. Maryan Hassan</option>
</select>

<select name="department" required>
<option value="">Select Department</option>
<option>Cardiology</option>
<option>General Medicine</option>
<option>Pediatrics</option>
<option>Orthopedics</option>
</select>

<input type="date" name="date" required>

<input type="time" name="time" required>

<textarea name="notes" rows="4" placeholder="Symptoms or Notes"></textarea>

<button type="submit" name="book">
Book Appointment
</button>

</form>

</div>

</div>

</body>
</html>