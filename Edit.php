

<?php
include_once("conection.php");
$idbanaan=$fnamebanaan=$lastnamebanaan=$emailbanaan="";
if (isset($_POST['btnsave'])){
    // conditions of if

    $id=$_POST["txtid"];

        $idd=$_POST["txtidd"];


    $name=$_POST['txtfirst'];
    $last=$_POST['txtlast'];
       $emial=$_POST['txtemail'];

//hadii oo banaayey soo gali
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

if(!preg_match("/^[0-9]{1,6}$/",$id))
    {
          echo"id must not be more than 6 digits".$id;
     

    }
    else if (preg_match('/^[0-9]{6}$/',$id)){
    
        echo"valid id".$id;
    }
    else{
$sql="update registration set id='".$id."',fname='".$name."',lastname='".$last."',email='".$emial."'where id='".$idd."'";//waa halka ay ka soo galyaan xogta databaseka hadii aya singl cout double ka 

$result=$con->query($sql); // waxa oo ku xidhmayaa sql page kii kale ee ahaa conectionka 
echo"this information was updated";
header("location:registration.php");//waa ka in tusaaya jogna edit page ka  ina goo  registrationka  ;

    //waa inta soo saray sa marka add ka tagtid mid kamida 
    echo"welecom your id  is :-".$id;
    
  
    echo"welecom your name is :-".$name;

  
    echo"welecom your name is :-".$last;

     
    echo"welecom your name is :-".$emial;
    }

}
$ed= "select * from registration where id= '".$_GET['id']."'";
$re=$con->query($ed);
$show=mysqli_fetch_array($re);    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>second php lesson</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>

/* BODY */
body{
    margin:0;
    padding:0;
    font-family:Arial, Helvetica, sans-serif;
    background:#001f54;   /* Navy Blue */
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* HEADING */
h1{
    position:absolute;
    top:20px;
    color:white;
    font-size:32px;
    font-weight:bold;
}

/* FORM */
form{
    width:420px;
    background:white;
    padding:35px;
    border-radius:15px;
    box-shadow:0 10px 25px rgba(0,0,0,0.4);
}

/* LABELS */
label{
    font-weight:bold;
    color:#222;
}

/* INPUTS */
input[type="text"],
input[type="number"]{
    width:100%;
    padding:12px;
    margin-top:8px;
    margin-bottom:18px;
    border:1px solid #ccc;
    border-radius:8px;
    font-size:16px;
    box-sizing:border-box;
}

input[type="text"]:focus,
input[type="number"]:focus{
    border:2px solid #0066ff;
    outline:none;
    box-shadow:0 0 10px rgba(0,102,255,.4);
}

/* BUTTON */
input[type="submit"]{
    width:100%;
    padding:13px;
    background:#0066ff;
    color:white;
    font-size:18px;
    border:none;
    border-radius:8px;
    cursor:pointer;
    transition:0.4s;
}

/* BUTTON HOVER */
input[type="submit"]:hover{
    background:#00b894;
    transform:scale(1.05);
    box-shadow:0 5px 15px rgba(0,0,0,.3);
}

/* ERROR TEXT */
span{
    color:red;
    font-size:14px;
}

/* MOBILE */
@media(max-width:500px){
    form{
        width:90%;
        padding:20px;
    }

    h1{
        font-size:24px;
    }
}
  /* Social Media Icons */
.social-icons{
    position:absolute;
    bottom:30px;
    display:flex;
    gap:20px;
}

.social-icons a{
    width:50px;
    height:50px;
    background:white;
    color:#001f54;
    border-radius:50%;
    display:flex;
    justify-content:center;
    align-items:center;
    text-decoration:none;
    font-size:22px;
    transition:0.4s;
    box-shadow:0 5px 10px rgba(0,0,0,.3);
}

/* Hover Effects */
.social-icons a:hover{
    transform:translateY(-8px);
}

/* Facebook */
.social-icons a:nth-child(1):hover{
    background:#1877F2;
    color:white;
}

/* Instagram */
.social-icons a:nth-child(2):hover{
    background:#E1306C;
    color:white;
}

/* Twitter */
.social-icons a:nth-child(3):hover{
    background:#1DA1F2;
    color:white;
}

/* LinkedIn */
.social-icons a:nth-child(4):hover{
    background:#0077B5;
    color:white;
}

/* WhatsApp */
.social-icons a:nth-child(5):hover{
    background:#25D366;
    color:white;
}      
    </style>
        


</head>
<body >
    <h1>  EDITE YOURE REGISTRATION</h1>


    <form method="POST" >

            ID care:  <input type ="number " name ="txtid" value="<?php echo $show['id']  ?>">
              <input type ="hidden"  name ="txtidd" value="<?php echo $show['id']  ?>">

        
    <?php
    echo $idbanaan;
    ?>

    <br>
    <br>
    <BR>

     f-name :<input type ="text " name ="txtfirst" value="<?php echo $show['fname']  ?>">
     <?php
     echo $fnamebanaan; //waa ku wa inoo suragalinaaya
  ?>
</BR>

  <br>
  
<BR>
    last-name :<input type ="text " name ="txtlast" value="<?php echo $show['lastname']  ?>">
    <?php
echo $lastnamebanaan;
  ?>
</BR>

  <br>
  
    <BR>
     emial:<input type ="text " name ="txtemail" value="<?php echo $show['email']  ?>">
      <?php
echo $emailbanaan;
  ?>
    <br>
<BR>
<input type ="submit" name="btnsave" value="UPDATE"> 
</br>
<br>

<div class="social-icons">
    <a href="#"><i class="fab fa-facebook-f"></i></a>
    <a href="#"><i class="fab fa-instagram"></i></a>
    <a href="#"><i class="fab fa-twitter"></i></a>
    <a href="#"><i class="fab fa-linkedin-in"></i></a>
    <a href="#"><i class="fab fa-whatsapp"></i></a>
</div>

</form>





</body>
</html>