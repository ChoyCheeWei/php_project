<?php

//including the database server connection php file..
include("config.php");

//getting id from url..
$id=$_GET['id'];

//deleting the appointment records in database..
$result = mysqli_query($mysqli, "DELETE FROM studappointment WHERE appointment_id=$id");

//redirecting to the display main page..
header("Location:staffMainPage.php");
?>

