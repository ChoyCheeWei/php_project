<?php
session_start();
?>
<?php
//including the database server connection php file..
include_once('config.php');

//fetching records from database in ascending order..
$result = mysqli_query($mysqli, "SELECT * FROM studappointment WHERE student_id=" . $_SESSION['id'] . " ORDER BY appointment_date ASC");
$result2 = mysqli_query($mysqli, "SELECT * FROM student WHERE student_id=" . $_SESSION['id'] . "");
?>

<html>
    <head>
        <title>Student Main Page</title>
        <!-- Cascading Style Sheet -->
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
        <style>
            table{
                margin:auto;
                text-align: center;
                table-layout: fixed;
            }
            table th, td{
                padding: 6px;
                border: 1px solid black;
                border-collapse: collapse;
                opacity: 0.95;
            }
            th, td{
                padding: 3px;
            }
            th{
                background: red;
                color: white;
            }
            html{
                background: url(css/student3.jpg) no-repeat center center fixed;
                background-size: 100% 100%;
            }
        </style>
    </head>
    <body>
        <div align="left">
            <font size="5" style="background-color:whitesmoke"><b>Welcome <?php echo $_SESSION['name'] ?> <a href="userLogout.php"><button id="button" style="width: 130px; float: right">LOGOUT</button></a>
        </div>
        </br>
        <div align="center">
            <a href="userCreateAppointmentPage.php"><button id="button" style="width: 200px; height:55px">MAKE APPOINTMENT</button></a>
            <?php
            while ($res = mysqli_fetch_array($result2)) {
                echo "<a href =\"userManagePersonalInfoPage.php?id=$res[student_id]\"><button id=\"button\" style = \"width: 250px; height:55px\">MANAGE PERSONAL INFORMATION</button></a>";
            }
            ?>
        </div>
        </br>
        <!-- form table -->
        <table align="center" style="background-color:white" border="1">
            <tr align="center" style="font-size:18px; background-color:whitesmoke">
                <th>DATE</th>
                <th>TIME</th>
                <th>LECTURER'S NAME</th>
                <th>DESCRIPTION</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
            <?php
            while ($res = mysqli_fetch_array($result)) {
                echo "<tr align=center>";
                echo "<td>" . $res['appointment_date'] . "</td>";
                echo "<td>" . $res['appointment_time'] . "</td>";
                echo "<td align=left>" . $res['appointment_staff_name'] . "</td>";
                echo "<td align=left>" . $res['appointment_description'] . "</td>";
                echo "<td>" . $res['appointment_status'] . "</td>";
                echo "<td>";
                echo"<a href=\"userUpdateAppointmentPage.php?id=$res[appointment_id]\"><button id=\"button\">UPDATE</button></a>";
                echo"<a href=\"userDeleteAppointmentPage.php?id=$res[appointment_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button id=\"button\">DELETE</button></a>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        </br></br>
        <!-- displays footer at bottom page -->
        <div> 
            <footer><font size="5"><strong>&copy; Copyright 2018 - Universiti Utara Malaysia.</strong></font></footer>
        </div>
    </body>
</html>

