<?php
session_start();
?>
<?php
//including the database server connection php file..
include_once('config.php');

//fetching records from database in ascending order..
$result = mysqli_query($mysqli, "SELECT * FROM studappointment INNER JOIN student ON studappointment.student_id=student.student_id ORDER BY appointment_date ASC");
$result2 = mysqli_query($mysqli, "SELECT * FROM staff WHERE staff_id=" . $_SESSION['id'] . "");
?>

<html>
    <head>
        <title>Staff Main Page</title>
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
                background: url(css/lecturer2.jpg) no-repeat center center fixed;
                background-size: 100% 100%;
            }
        </style>
    </head>
    <body>
        <div align="left">
            <font size="5" style="background-color:whitesmoke"><b>Welcome <?php echo $_SESSION['name'] ?> <a href="staffLogout.php"><button id="button" style="width: 130px; float: right">LOGOUT</button></a>
                <?php
                while ($res = mysqli_fetch_array($result2)) {
                    echo "<a href =\"staffManagePersonalInfoPage.php?id=$res[staff_id]\"><button id=\"button\" style = \"width: 240px; float:right\">MANAGE PERSONAL</button></a>";
                }
                ?>
        </div>
        </br>
        <h2 align="center" style="color: black">LIST OF APPOINTMENTS</h2> 
        <!-- form table -->
        <table align="center" style="background-color:white" border="1">
            <tr align="center" style="font-size:18px; background-color:whitesmoke">
                <th>DATE</th>
                <th>TIME</th>
                <th>PURPOSE</th>
                <th>STUDENT'S MATRIC NO</th>
                <th>STUDENT'S NAME</th>
                <th>STATUS</th>
                <th>ACTION</th>
            </tr>
            <?php
            while ($res = mysqli_fetch_array($result)) {
                echo "<tr align=center>";
                echo "<td>" . $res['appointment_date'] . "</td>";
                echo "<td>" . $res['appointment_time'] . "</td>";
                echo "<td align=left>" . $res['appointment_description'] . "</td>";
                echo "<td>" . $res['student_matric_no'] . "</td>";
                echo "<td align=left>" . $res['student_name'] . "</td>";
                echo "<td>" . $res['appointment_status'] . "</td>";
                echo "<td>";
                echo"<a href=\"staffChangeStatusPage.php?id=$res[appointment_id]\"><button id=\"button\">CHANGE</button></a>";
                echo"<a href=\"staffDeleteAppointmentPage.php?id=$res[appointment_id]\" onClick=\"return confirm('Are you sure you want to delete?')\"><button id=\"button\">DELETE</button></a>";
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

