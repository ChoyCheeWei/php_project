<?php
session_start();
?>

<?php
//including the database server connection php file..
include_once('config.php');

//if the submit button is clicked
if (isset($_POST['changePassword'])) {
    $id = $_POST['id'];

    $staff_password = $_POST['staff_password'];
    $staff_password2 = $_POST['staff_password2'];

    $result = mysqli_query($mysqli, "SELECT * FROM staff WHERE staff_password='$staff_password'");
    $row = mysqli_fetch_assoc($result);
    if (is_array($row) && !empty($row)) {
        $result = mysqli_query($mysqli, "UPDATE staff SET staff_password='$staff_password2' WHERE staff_id=$id");

        //display success message..
        echo
        "<script>
            window.alert('Your password has been successfully updated!');
            window.location.href='staffMainPage.php';
        </script>";
    } else {
        echo
        "<script>
            window.alert('Your old password is wrong!');
            window.location.href='staffChangePasswordPage.php';
        </script>";
    }
}
?>
<html>
    <head>
        <title>Change Password Page</title>
        <!-- Cascading Style Sheet -->
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
    </head>
    <style>
        html{
            background: url(css/lecturer2.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <div align="left" margin="2px">
        <a href="staffMainPage.php"><button id="button" style="width: 125px">BACK</button></a>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:52%; background-color: white">
                <legend><b><font color='red'>Change Password</font></legend>
                <!-- html form where the password will be updated -->
                <form method="POST" action="staffChangePasswordPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Old Password : </td>
                            <td><input type='password' name='staff_password' placeholder=" Old Password" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>New Password : </td>
                            <td><input type='password' name='staff_password2' placeholder=" New Password" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td>
                            <td><input type="hidden" name="id" value=<?php echo $_SESSION['id']; ?>></td>
                        <tr>
                            <td></td>
                            <td><input id="button" type="Submit" name="changePassword" value="SUBMIT" style="width: 120px"/> <input id="button" type="reset" value="RESET" style="width: 120px"/></td> 
                            </td>
                        </tr>
                    </table>
                </form>
            </fieldset>
        </div>
    </body>
</html>
