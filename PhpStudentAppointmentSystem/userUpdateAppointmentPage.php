<?php
session_start();
?>

<?php
//including the database server connection php file..
include_once('config.php');

//if the update button is clicked..
if (isset($_POST['updateAppointment'])) {
    $id = $_POST['id'];

    $appointment_staff_name = $_POST['appointment_staff_name'];
    $appointment_date = $_POST['appointment_date'];
    $appointment_time = $_POST['appointment_time'];
    $appointment_description = $_POST['appointment_description'];
    $appointment_status = $_POST['appointment_status'];

    //updating appointment details into database..
    $result = mysqli_query($mysqli, "UPDATE studappointment SET appointment_staff_name='$appointment_staff_name',appointment_date='$appointment_date',appointment_time='$appointment_time',appointment_description='$appointment_description',"
            . "appointment_status='$appointment_status' WHERE appointment_id=$id");

    //displays success message..
    echo
    "<script>
        window.alert('Your appointment schedule successfully updated!');
        window.location.href='userMainPage.php';
    </script>";
}
?>

<html>
    <head>
        <title>Update Appointment Page</title>
        <!-- Cascading Style Sheet -->
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
    </head>
    <div align="left" margin="2px">
        <a href="userMainPage.php"><button id="button" style="width: 120px">BACK</button></a>
        <a href="userLogout.php"><button id="button" style="width: 130px; float: right">LOGOUT</button></a>
    </div>
    <style>
        html{
            background: url(css/student3.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <body>
        <div align='center' id="div">
            <fieldset style="width:50%; background-color: whitesmoke">
                <legend><b><font color='red'>Update Schedule</font></legend>
                <?php
                //getting id from url..
                $id = $_GET['id'];

                //selecting data associated with this particular id..
                $result = mysqli_query($mysqli, "SELECT * FROM studappointment WHERE appointment_id=$id");
                while ($res = mysqli_fetch_array($result)) {
                    $appointment_id = $res['appointment_id'];
                    $appointment_staff_name = $res['appointment_staff_name'];
                    $appointment_date = $res['appointment_date'];
                    $appointment_time = $res['appointment_time'];
                    $appointment_description = $res['appointment_description'];
                }
                ?>
                <!-- html form where the appointment's information will be updated -->
                <form method="POST" action="userUpdateAppointmentPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Doctor : </td>
                            <td>
                                <select name="appointment_staff_name" style="height: 30px; width: 250px" required>
                                    <option style="color:white"><?php echo $appointment_staff_name; ?></option>
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
                            <td><input type='date' name='appointment_date' placeholder="Appoinment Date" value="<?php echo $appointment_date; ?>" style="height: 30px; width: 250px"></td>
                        </tr>
                        <tr>
                            <td><b>Time : </td>
                            <td>
                                <select name="appointment_time" style="height: 30px; width: 250px" required>
                                    <option><?php echo $appointment_time; ?></option>
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
                            <td><textarea name='appointment_description' placeholder="Appointment Description" style="height: 50px; width: 250px"><?php echo $appointment_description; ?></textarea></td>            
                        </tr>
                        <tr>
                            <td>
                            <td><input type="hidden" name="appointment_status" value="Pending"></td>
                        <tr>
                            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                            <td>
                                <input id="button" type="Submit" name="updateAppointment" value="UPDATE" style="width: 120px"/> 
                                <input id="button" type="reset" value="RESET" style="width: 120px"/>
                            </td>
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

