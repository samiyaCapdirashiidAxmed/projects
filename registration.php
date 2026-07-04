


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


echo"<tr><td>".$row['id']."</td><td>".$row['fname']."</td><td>".$row['lastname']."</td><td>".$row['email']."</td><td>.<button> <a href='Edit.php?id=$row[id]'>Edit"."  <button> <a href='DELET1.php'>DELET"."</a></button></a></button></td></tr>";//waa sida loo so galinayo xogta taaala databaseka

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

<div class="social-icons">
        <a href="https://facebook.com"><i class="fab fa-facebook"></i></a>
        <a href="https://twitter.com"><i class="fab fa-twitter"></i></a>
        <a href="https://instagram.com"><i class="fab fa-instagram"></i></a>
    </div>
</footer>

</html>

