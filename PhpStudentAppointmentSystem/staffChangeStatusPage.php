<?php
session_start();
?>

<?php
//including the database server connection php file..
include_once('config.php');

//if the confirm button is clicked..
if (isset($_POST['status'])) {
    $id = $_POST['id'];
    $appointment_status = $_POST['appointment_status'];

    //updating appointment details into database..
    $result = mysqli_query($mysqli, "UPDATE studappointment SET appointment_status='$appointment_status' WHERE appointment_id=$id");

    //displays success message..
    echo
    "<script>
        window.alert('Appointment status is updated!');
        window.location.href='staffMainPage.php';
    </script>";
}
?>

<html>
    <head>
        <title>View Appointment Schedule</title>
        <!-- Cascading Style Sheet -->
        <link rel="stylesheet" type="text/css" href="./css/w3.css">
    </head>
    <style>
        html{
            background: url(css/lecturer2.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <div align="left" margin="2px">
        <a href="staffMainPage.php"><button id="button" style="width: 120px">BACK</button></a>
        <a href="staffLogout.php"><button id="button" style="width: 130px; float: right">LOGOUT</button></a>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:38%; background-color: white">
                <legend><b><font color='red'>View Schedule</font></legend>
                <?php
                //getting id from url..
                $id = $_GET['id'];

                //selecting data associated with this particular id..
                $result = mysqli_query($mysqli, "SELECT * FROM studappointment WHERE appointment_id=$id");
                while ($res = mysqli_fetch_array($result)) {
                    $appointment_date = $res['appointment_date'];
                    $appointment_time = $res['appointment_time'];
                    $appointment_status = $res['appointment_status'];
                }
                ?>
                <!-- html form where the appointment's status will be updated -->
                <form method="POST" action="staffChangeStatusPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Date : </td>
                            <td><input type='date' name='appointment_date' value="<?php echo $appointment_date; ?>" style="height: 30px; width: 200px; background-color: lemonchiffon" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Time : </td>
                            <td><input type='time' name='appointment_time' value="<?php echo $appointment_time; ?>" style="height: 30px; width: 200px; background-color: lemonchiffon" disabled></td>
                        </tr>
                        <tr>
                            <td><b>Status : </td>
                            <td>
                                <select name="appointment_status" style="height: 30px; width: 200px" required>
                                    <option style="color: white"><?php echo $appointment_status; ?></option>
                                    <option value="Pending">Pending</option>
                                    <option value="Approved">Approved</option>
                                    <option value="Request Change">Request Change</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <td></td>
                        <tr>
                            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                            <td align='right'>
                                <input id="button" type="Submit" name="status" value="CONFIRM" style="width: 120px"/> 
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



