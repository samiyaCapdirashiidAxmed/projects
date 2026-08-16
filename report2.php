<?php

$con = mysqli_connect(
    "localhost",
    "root",
    "",
    "software_project_management2"
);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}


/* =========================
   TOTAL REGISTERED PATIENTS
========================= */

$totalQuery = mysqli_query(
    $con,
    "SELECT COUNT(*) AS total FROM registration1"
);

$totalData = mysqli_fetch_assoc($totalQuery);

$totalPatients = $totalData['total'];


/* =========================
   MALE PATIENTS
========================= */

$maleQuery = mysqli_query(
    $con,
    "SELECT COUNT(*) AS total
     FROM registration1
     WHERE gender = 'Male'"
);

$maleData = mysqli_fetch_assoc($maleQuery);

$malePatients = $maleData['total'];


/* =========================
   FEMALE PATIENTS
========================= */

$femaleQuery = mysqli_query(
    $con,
    "SELECT COUNT(*) AS total
     FROM registration1
     WHERE gender = 'Female'"
);

$femaleData = mysqli_fetch_assoc($femaleQuery);

$femalePatients = $femaleData['total'];


/* =========================
   ALL REGISTERED PATIENTS
========================= */

$patients = mysqli_query(
    $con,
    "SELECT fullname, username, email, phone, gender, age
     FROM registration1
     ORDER BY fullname ASC"
);

?>

<!DOCTYPE html>

<html lang="en">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Patient Registration Report</title>

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


<style>

/* =========================
   GENERAL
========================= */

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;
}

body{

    background:#f4f7fb;

    color:#263238;

}


/* =========================
   SIDEBAR
========================= */

.sidebar{

    position:fixed;

    left:0;
    top:0;

    width:230px;

    height:100vh;

    background:#111c44;

    padding:25px 15px;

    color:white;

}

.logo{

    text-align:center;

    font-size:22px;

    font-weight:bold;

    margin-bottom:40px;

}

.logo i{

    color:#4da3ff;

    margin-right:8px;

}

.menu{

    list-style:none;

}

.menu li{

    margin-bottom:10px;

}

.menu a{

    display:flex;

    align-items:center;

    gap:13px;

    padding:14px;

    color:#cbd3e6;

    text-decoration:none;

    border-radius:8px;

    transition:.3s;

}

.menu a:hover,
.menu a.active{

    background:#263b82;

    color:white;

}

.menu i{

    width:20px;

}


/* =========================
   MAIN
========================= */

.main{

    margin-left:230px;

    padding:30px;

}


/* =========================
   HEADER
========================= */

.header{

    display:flex;

    justify-content:space-between;

    align-items:center;

    margin-bottom:30px;

}

.header h1{

    color:#172554;

    font-size:30px;

}

.header p{

    color:#718096;

    margin-top:7px;

}

.header-icon{

    width:55px;

    height:55px;

    background:#2563eb;

    color:white;

    border-radius:10px;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:24px;

}


/* =========================
   SUMMARY CARDS
========================= */

.cards{

    display:grid;

    grid-template-columns:
    repeat(3,1fr);

    gap:20px;

    margin-bottom:30px;

}

.card{

    background:white;

    padding:25px;

    border-radius:12px;

    box-shadow:
    0 3px 12px rgba(0,0,0,.07);

    display:flex;

    align-items:center;

    gap:18px;

}

.card-icon{

    width:55px;

    height:55px;

    border-radius:10px;

    background:#eaf3ff;

    color:#2563eb;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:23px;

}

.card h2{

    font-size:28px;

    color:#172554;

}

.card p{

    color:#718096;

    font-size:14px;

    margin-top:5px;

}


/* =========================
   REPORT
========================= */

.report{

    background:white;

    border-radius:12px;

    box-shadow:
    0 3px 12px rgba(0,0,0,.07);

    overflow:hidden;

}

.report-header{

    padding:22px;

    border-bottom:
    1px solid #e5e7eb;

    display:flex;

    justify-content:space-between;

    align-items:center;

}

.report-header h2{

    color:#172554;

    font-size:21px;

}

.report-header p{

    color:#718096;

    margin-top:6px;

    font-size:14px;

}


/* =========================
   TABLE
========================= */

.table-box{

    overflow-x:auto;

}

table{

    width:100%;

    border-collapse:collapse;

}

thead{

    background:#172554;

    color:white;

}

th{

    padding:15px;

    text-align:left;

    font-size:14px;

}

td{

    padding:14px 15px;

    border-bottom:
    1px solid #edf0f5;

    font-size:14px;

}

tbody tr:hover{

    background:#f8fafc;

}


/* =========================
   GENDER
========================= */

.male{

    background:#e0efff;

    color:#1769aa;

    padding:5px 11px;

    border-radius:20px;

    font-size:12px;

    font-weight:bold;

}

.female{

    background:#ffe5f0;

    color:#c2185b;

    padding:5px 11px;

    border-radius:20px;

    font-size:12px;

    font-weight:bold;

}


/* =========================
   EMPTY
========================= */

.empty{

    text-align:center;

    padding:50px;

    color:#94a3b8;

}

.empty i{

    font-size:45px;

    margin-bottom:15px;

}


/* =========================
   RESPONSIVE
========================= */

@media(max-width:900px){

    .sidebar{

        width:70px;

    }

    .logo span,
    .menu span{

        display:none;

    }

    .main{

        margin-left:70px;

    }

    .cards{

        grid-template-columns:1fr;

    }

}

</style>

</head>


<body>


<!-- =========================
     SIDEBAR
========================= -->

<div class="sidebar">

    <div class="logo">

        <i class="fas fa-hospital"></i>

        <span>HOSPITAL</span>

    </div>


    <ul class="menu">

        <li>

            <a href="#">

                <i class="fas fa-chart-line"></i>

                <span>Dashboard</span>

            </a>

        </li>


        <li>

            <a href="#" class="active">

                <i class="fas fa-file-medical"></i>

                <span>Registration Report</span>

            </a>

        </li>


        <li>

            <a href="#">

                <i class="fas fa-user-doctor"></i>

                <span>Doctors</span>

            </a>

        </li>


        <li>

            <a href="#">

                <i class="fas fa-calendar-check"></i>

                <span>Appointments</span>

            </a>

        </li>


        <li>

            <a href="#">

                <i class="fas fa-users"></i>

                <span>Patients</span>

            </a>

        </li>

    </ul>

</div>



<!-- =========================
     MAIN CONTENT
========================= -->

<div class="main">


    <!-- HEADER -->

    <div class="header">

        <div>

            <h1>Patient Registration Report</h1>

            <p>
                Complete report of registered patients
            </p>

        </div>


        <div class="header-icon">

            <i class="fas fa-file-medical"></i>

        </div>

    </div>



    <!-- SUMMARY CARDS -->

    <div class="cards">


        <div class="card">

            <div class="card-icon">

                <i class="fas fa-users"></i>

            </div>

            <div>

                <h2>
                    <?php echo $totalPatients; ?>
                </h2>

                <p>
                    Total Registered
                </p>

            </div>

        </div>



        <div class="card">

            <div class="card-icon">

                <i class="fas fa-mars"></i>

            </div>

            <div>

                <h2>
                    <?php echo $malePatients; ?>
                </h2>

                <p>
                    Male Patients
                </p>

            </div>

        </div>



        <div class="card">

            <div class="card-icon">

                <i class="fas fa-venus"></i>

            </div>

            <div>

                <h2>
                    <?php echo $femalePatients; ?>
                </h2>

                <p>
                    Female Patients
                </p>

            </div>

        </div>

    </div>



    <!-- REGISTRATION REPORT -->

    <div class="report">


        <div class="report-header">

            <div>

                <h2>

                    <i class="fas fa-users"></i>

                    Registered Patients

                </h2>

                <p>
                    List of all patients registered
                    in the hospital system.
                </p>

            </div>


            <i class="fas fa-clipboard-list"
            style="
            font-size:28px;
            color:#2563eb;
            ">
            </i>

        </div>



        <!-- TABLE -->

        <div class="table-box">

            <table>

                <thead>

                    <tr>

                        <th>#</th>

                        <th>Full Name</th>

                        <th>Username</th>

                        <th>Email</th>

                        <th>Phone</th>

                        <th>Gender</th>

                        <th>Age</th>

                    </tr>

                </thead>


                <tbody>

                <?php

                $number = 1;

                if(mysqli_num_rows($patients) > 0){

                    while($row =
                    mysqli_fetch_assoc($patients)){

                ?>

                    <tr>

                        <td>
                            <?php echo $number++; ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['fullname']
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['username']
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['email']
                            );
                            ?>
                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['phone']
                            );
                            ?>
                        </td>

                        <td>

                            <?php

                            if($row['gender'] == "Male"){

                                echo
                                '<span class="male">
                                Male
                                </span>';

                            }else{

                                echo
                                '<span class="female">
                                Female
                                </span>';

                            }

                            ?>

                        </td>

                        <td>
                            <?php
                            echo htmlspecialchars(
                                $row['age']
                            );
                            ?>
                        </td>

                    </tr>

                <?php

                    }

                }else{

                ?>

                    <tr>

                        <td colspan="7">

                            <div class="empty">

                                <i class="
                                fas fa-folder-open">
                                </i>

                                <br>

                                No registered patients
                                found.

                            </div>

                        </td>

                    </tr>

                <?php

                }

                ?>

                </tbody>

            </table>

        </div>

    </div>


</div>

</body>

</html>
