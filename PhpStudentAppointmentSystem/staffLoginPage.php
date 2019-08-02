<?php
session_start();
?>

<?php
//including the database server connection php file..
include_once('config.php');

//if the login button is clicked
if (isset($_POST['staffLogin'])) {
    //receive all input values from login page
    $staff_username = $_POST['staff_username'];
    $staff_password = $_POST['staff_password'];

    $result = mysqli_query($mysqli, "SELECT * FROM staff WHERE staff_username='$staff_username' AND staff_password='$staff_password'");
    $row = mysqli_fetch_assoc($result);
    if (is_array($row) && !empty($row)) {
        $_SESSION['id'] = $row['staff_id'];
        $_SESSION['name'] = $row['staff_name'];
        echo
        "<script>
            window.alert('Welcome Lecturer!');
            window.location.href='staffMainPage.php';
        </script>";
    } else {
        echo
        "<script>
            window.alert('Wrong username or password combination!');
        </script>";
    }
}
?>

<html>
    <head>
        <title>Lecturer Login Page</title>
        <!-- Cascading Style Sheet -->
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
    </head>
    <style>
        html{
            background: url(css/lecturer3.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <div align="left" margin="2px">
        <a href="index.php"><button id="button" style="width: 125px">HOME</button></a>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:50%; background-color: whitesmoke">
                <legend><b><font color='red'>Lecturer Login</font></legend>
                <!-- html form where the username and password will be inserted -->
                <form method="POST" action="staffLoginPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Username : </td>
                            <td><input type='text' name='staff_username' placeholder=" Username" style="height: 30px; width: 250px" required></td>
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
                            <td><input id="button" type="Submit" name="staffLogin" value="LOGIN" style="width: 120px"/> <input id="button" type="reset" value="RESET" style="width: 120px"/></td> 
                            </td>
                        </tr>
                    </table>
                    <p>
                        <font size="4" color="red"><strong>Not yet register ? </strong><a href="staffRegisterPage.php"/>Click Here to Sign Up</a>
                    </p>
                </form>
            </fieldset>
        </div>
        <!-- displays footer at bottom page -->
        <div> 
            <footer><font size="5"><strong>&copy; Copyright 2018 - Universiti Utara Malaysia.</strong></font></footer>
        </div>
    </body>
</html>


