<?php
//including the database server connection php file..
include_once('config.php');

//if the register button is clicked..
if (isset($_POST['staffRegister'])) {
    //receive all input values from the register form..
    $staff_no = $_POST['staff_no'];
    $staff_username = $_POST['staff_username'];
    $staff_name = $_POST['staff_name'];
    $staff_email = $_POST['staff_email'];
    $staff_password = $_POST['staff_password'];

    //check whether staff no is already exist or not...
    $user_check_query = "SELECT * FROM staff WHERE staff_no='$staff_no' LIMIT 1";
    $result = mysqli_query($mysqli, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['staff_no'] === $staff_no) {
            //displays error message..
            echo
            "<script>
                window.alert('This staff no is already exist!');
                window.location.href='staffRegisterPage.php';
            </script>";
        }
    } else {
        //insert lecturer's details into database..
        $result = mysqli_query($mysqli, "INSERT INTO staff (staff_no, staff_username, staff_name, staff_email, staff_password) 
                                         VALUES('$staff_no','$staff_username','$staff_name','$staff_email', '$staff_password')");

        //displays success message..
        echo
        "<script>
        window.alert('You have successfully registered!');
        window.location.href='index.php';
        </script>";
    }
}
?>
<html>
    <head>
        <title>Lecturer Register Page</title>
        <!-- Cascading Style Sheet--> 
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
    </head>
    <style>
        html{
            background: url(css/lecturer3.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <div align="left" margin="2px">
        <a href="index.php"><button id="button" style="width: 120px">HOME</button></a>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:55%; background-color: whitesmoke">
                <legend><b><font color='red'>Lecturer Registration Form</font></legend>
                <!-- html form where the lecturer's information will be inserted -->
                <form method="POST" action="staffRegisterPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Staff No : </td>
                            <td><input type='text' name='staff_no' placeholder=" Staff No" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Username : </td>
                            <td><input type='text' name='staff_username' placeholder=" Username" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Name : </td>
                            <td><input type='text' name='staff_name' placeholder=" Name" style="height: 30px; width: 250px" required=""></td>
                        </tr>
                        <tr>
                            <td><b>Email Address : </td>
                            <td><input type='email' name='staff_email' placeholder=" Email Address" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Password : </td>
                            <td><input type='password' name='staff_password' placeholder=" Password" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td>
                            <td></td>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input id="button" type="Submit" name="staffRegister" value="REGISTER" style="width: 120px"/> <input id="button" type="reset" value="RESET" style="width: 120px"/></td> 
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

