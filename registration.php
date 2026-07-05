


<?php
include_once("conection.php"); //conection to my sql
$idbanaan=$fnamebanaan=$lastnamebanaan=$emailbanaan=$phonebanaan=""; // halka ku shegaysa in ay maqantay (xog aanad soo galin ) magacyadooda 
if (isset($_POST['btnsave']))
{
    // conditions of if {halkay soo galayaan xogto }

    $id=$_POST["txtID"]; 
    $name=$_POST['txtfirst'];
    $last=$_POST['txtlast'];
       $emial=$_POST['txtemail'];
       $phonenumber=$_POST['txtphone'];

//hadii oo banaayey soo gali [waa halka ku shegaysa in hadii colum banaan ka tagtid in oo banaan yey]
if(empty($id)){
$idbanaan="please enter your id";

}
 if(empty($name)){
$fnamebanaan="please enter your ferst name";
//echo $fnamebanaan;
}

if(empty($name)){
$lastnamebanaan="please enter your last name";

}
if(empty($name)){
$emailbanaan="please enter your last email";

}
if(empty($id)){
$phonebanaan="please enter your last email";

}

    //id is not more than 6 only can write 1 up to 5 ina udhaxaysa 
    //waxay ku xadidaysaa numberka soo galaaya id ga 
  if (!ctype_digit($id)|| strlen($id)>6)
  
  {
          echo"id must not be more than 6 digits".$id;
     

    }
    else if (preg_match('/^[0-9]{6}$/',$id)){
    
        echo"valid id".$id;
    }

    else{
$sql="insert into registration set id='".$id."',fname='".$name."',lastname='".$last."',email='".$emial."',phone='".$phonenumber."'";//waa halka ay ka soo galyaan xogta databaseka hadii aya singl cout double ka u dhxeeyo 

$result=$con->query($sql); // waxa oo ku xidhmayaa sql page kii kale ee ahaa conectionka 
echo"this information was saved";

    //waa inta soo saray sa marka add ka tagtid mid kamida 
    echo"welecom your id  is :-".$id;
    
  
    echo"welecom your first name is :-".$name;

  
    echo"welecom your last name is :-".$last;

     
    echo"welecom your email is :-".$emial;

        echo"welecom your phone number is :-".$phonenumber;

    }

}   
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>second php lesson</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<style>
/* General Body Style */

/* BODY */

body {
            /* Ku dar sawirkaaga halkan */
            background-image: url('https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=1920&auto=format&fit=crop');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            
            /* Ku dar midab madow oo daciif ah si qoraalka cad u muuqdo */
            background-color: rgba(0, 0, 0, 0.4);
            background-blend-mode: overlay;

            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 20px;
        }

/* TITLE */
h1{
    text-align: center;
    color: #fff;
    font-size: 38px;
    margin-bottom: 25px;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
}

/* CLEAN WHITE CARD */
form{
    width: 60%;
    margin: auto;
    background: #fff;
    padding: 30px;
    border-radius: 25px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}

/* LABELS */
form{
    color: #2c3e50;
    font-weight: bold;
}

/* INPUTS */
input[type="text"],
input[type="number"]{
    width: 95%;
    padding: 12px;
    border: 2px solid #dbe4ff;
    border-radius: 15px;
    margin-bottom: 15px;
    font-size: 15px;
    transition: 0.3s;
}

input[type="text"]:focus,
input[type="number"]:focus{
    border-color: #2563eb;
    box-shadow: 0 0 10px rgba(37,99,235,0.3);
    outline: none;
}

/* PROFESSIONAL BLUE BUTTON */
input[type="submit"]{
    background: #2563eb;
    color: white;
    border: none;
    padding: 12px 25px;
    border-radius: 15px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: 0.3s;
    
}

input[type="submit"]:hover{
    background: #9b20e8;
    transform: translateY(-2px);
}

/* TABLE */
table{
    width: 90%;
    margin: 30px auto;
    background: white;
    border-collapse: collapse;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}

th{
    background: #2563eb;
    color: white;
    padding: 15px;
    font-size: 16px;
}

td{
    padding: 12px;
    text-align: center;
    border-bottom: 1px solid #eee;
}

tr:nth-child(even){
    background: #f8fafc;
}

tr:hover{
    background: #a4b4f8;
    transition: 0.3s;
}

/* GREEN EDIT BUTTON */
.edit-btn{
    background: #16a34a;
    color: white;
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.edit-btn:hover{
    background: #15803d;
    transform: scale(1.05);
}

/* RED DELETE BUTTON */
.delete-btn{
    background: #dc2626;
    color:#2563eb;
    padding: 8px 16px;
    border-radius: 20px;
    text-decoration: none;
    font-weight: bold;
    transition: 0.3s;
}

.delete-btn:hover{
    background: #b91c1c;
    transform: scale(1.05);
}
form{
    width: 60%;
    max-width: 600px;
    margin: 30px auto;
    background: white;
    padding: 30px;
    border-radius: 25px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
}
h1{
    text-align: center;
    color: white;
    margin-bottom: 20px;
}
.btnsave :hover{
    background: #a34df3;
}

footer {
    text-align: center;
    padding: 40px;
    color: white;
    font-size: 16px;
    margin-top: 50px;
    background: rgba(0, 0, 0, 0.2); /* Wax yar oo hoos u dhac ah si footer-ku u muuqdo */
}

.footer-content p {
    margin-bottom: 15px; /* Kala fogaanshaha qoraalka iyo icons-ka */
}

.social-icons a {
    font-size: 24px;
    margin: 0 15px;
    color: white;
    text-decoration: none;
    transition: 0.3s;
}

.social-icons a:hover {
    color: #f1c40f; /* Midab jaalle ah marka mouse-ka la saaro */
    transform: scale(1.2);
}

</style>

</head>
<body >
    <h1> welcom registration page</h1>


    <form method="POST" >

            ID care:  <input type ="number " name ="txtID" >
        
    <?php
    echo $idbanaan;
    ?>
    <br>
    <br>
    <BR>
     f-name :<input type ="text " name ="txtfirst">
     <?php
echo $fnamebanaan; //waa ku wa inoo suragalinaaya aynu ogaano in oo banaanyey
  ?>
</BR>

  <br>
  
    <BR>
    last-name :<input type ="text " name ="txtlast">
    <?php
echo $lastnamebanaan;
  ?>
</BR>

  <br>
  
    <BR>
     emial:<input type ="text " name ="txtemail">
      <?php
echo $emailbanaan;
  ?>
    <br>
</BR>
phone number:<input type ="text " name ="txtphone">
      <?php
echo $phonebanaan;
  ?>
    <br>
</BR>

<input type ="submit" name="btnsave" value="SUBMIT"> 
<br>
</br>
   search by ID:<input type ="text " name ="txtsearch">
      <?php
echo $emailbanaan;
  ?>
  
<input type ="submit" name="btnsearch" value="search"> 
<br>

</form>




<!-- tables -->
<table border="7">

<thead>

<h3>
<th>id</th>
<th>fname</th>
<th>lastname</th>
<th>email</th>

<th>action</th>


</h3>
</thead>
<tbody>
<?php

if(isset($_POST['btnsearch'])) // searchin id
{
  $search=$_POST['txtsearch'];
  $ss="select * from registration where id='".$search."'";//sql con in table 
  $ress=$con->query($ss);

  if(mysqli_num_rows($ress)==true)
    {
    foreach($ress as $rows)//loop 
      {
?>
<tr><td><?=$rows['id']?></td>
<td><?=$rows['fname']?></td>

<td><?=$rows['lastname']?></td>

<td><?=$rows['email']?></td>

<td><?=$rows['phone']?></td>


</tr>
<?php
    }
    
    }
    if($search=="")// haday bannantay 
      {
         $show="select * from registration ";
  $res=$con->query($show);
  if($res)//condition 
    {
while($row=$res->fetch_assoc()){      // fetch_assoc= waka inoo samxaya inaynu ka soo akh rino databaseka 1=wxa laisticmaalayaa fore loop 


echo"<tr><td>".$row['id']."</td><td>".$row['fname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td><td>.<button> <a href='Edit.php?id=$row[id]'>Edit"."  <button> <a href='#'>DELET"."</a></button></a></button></td></tr>";//waa sida loo so galinayo xogta taaala databaseka

}

    }

      }
      else{
        ?>
    <tr>
      <td>no data found</td> <!--used for not found-->
    </tr>
    <?php
      }
}

else{
?>

  <?php //ka ka masoolka ah in oo ka soo baxo xogto tableka
  $show="select * from registration ";
  $res=$con->query($show);
  if($res)//condition 
    {
while($row=$res->fetch_assoc()){      // fetch_assoc= waka inoo samxaya inaynu ka soo akh rino databaseka 1=wxa laisticmaalayaa fore loop 


echo"<tr><td>".$row['id']."</td><td>".$row['fname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td><td> <button> <a href='Edit.php?id=$row[id]'>Edit"."  <button> <a href='DELET.php?id=$row[id]'>DELET"."</a></button></a></button></td></tr>";//waa sida loo so galinayo xogta taaala databaseka

}

    }
}
  ?>
</tbody>
</table>
</body>

<footer>
    <div class="footer-content">
        <p>&copy; 2026 Registration System. All rights reserved.</p>
        <div class="social-icons">
            <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
            <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
            <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</footer>

</html>

