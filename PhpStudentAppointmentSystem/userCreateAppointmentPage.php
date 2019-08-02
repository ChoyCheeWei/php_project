<?php
session_start();
?>
<?php
//including the database server connection php file..
include_once('config.php');

//if the submit button is clicked..
if (isset($_POST['createAppointment'])) {
    //receive all input values from the appointment form..
    $appointment_staff_name = $_POST['appointment_staff_name'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $appointment_description = $_POST['appointment_description'];
    $appointment_status = $_POST['appointment_status'];
    $student_id = $_SESSION['id'];

    //insert appointment details into database..
    $result = mysqli_query($mysqli, "INSERT INTO studappointment (appointment_staff_name, appointment_date, appointment_time, appointment_description, appointment_status, student_id) 
                                     VALUES('$appointment_staff_name','$appointment_date','$appointment_time','$appointment_description','$appointment_status','$student_id')");

    //displays success message..
    echo
    "<script>
        window.alert('Your appointment was created successfully!');
        window.location.href='userMainPage.php';
    </script>";
}
?>

<html>
    <head>
        <title>Appointment Page</title>
        <!-- Cascading Style Sheet -->
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
    </head>
    <style>
        html{
            background: url(css/student3.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <div align="left" margin="2px">
        <a href="userMainPage.php"><button id="button" style="width: 120px">BACK</button></a>
        <a href="userLogout.php"><button id="button" style="width: 130px; float: right">LOGOUT</button></a>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:50%; background-color: whitesmoke">
                <legend><b><font color='red'>Add Appointment</font></legend>
                <!-- html form where the appointment's information will be inserted -->
                <form method="POST" action="userCreateAppointmentPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Lecturer : </td>
                            <td>
                                <select name="appointment_staff_name" style="height: 30px; width: 250px" required>
                                    <option></option>
                                    <?php
                                    //selecting data associated with this particular id..
                                    $result2 = mysqli_query($mysqli, "SELECT staff_name FROM staff");
                                    while ($row = mysqli_fetch_array($result2)) {
                                        echo
                                        "<option value='" . $row['staff_name'] . "'>" . $row['staff_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Date : </td>
                            <td><input type='date' name='appointment_date' placeholder="Appoinment Date" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Time : </td>
                            <td>
                                <select name="appointment_time" style="height: 30px; width: 250px" required>
                                    <option></option>
                                    <option value="10:00AM">10:00 AM</option>
                                    <option value="10:30AM">10:30 AM</option>
                                    <option value="11:30AM">11:30 AM</option>
                                    <option value="12:00PM">12:00 PM</option>
                                    <option value="1:30PM">1:30 PM</option>
                                    <option value="2:00PM">2:00 PM</option>
                                    <option value="2:30PM">2:30 PM</option>
                                    <option value="3:00PM">3:00 PM</option>
                                    <option value="3:30PM">3:30 PM</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><b>Description : </td>
                            <td><textarea name='appointment_description' placeholder="Appointment Description" style="height: 50px; width: 250px"></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                        <tr>
                            <td></td>
                            <td>
                                <input type="hidden" name="appointment_status" value="Pending">
                                <input id="button" type="Submit" name="createAppointment" value="SUBMIT" style="width: 120px"/> 
                                <input id="button" type="reset" value="RESET" style="width: 120px"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
        <!-- displays footer at bottom page -->
        <div> 
            <footer><font size="5"><strong>&copy; Copyright 2018 - Universiti Utara Malaysia.</strong></font></footer>
        </div>
    </body>
</html>


