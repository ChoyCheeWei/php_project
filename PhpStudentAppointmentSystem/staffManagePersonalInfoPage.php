<?php
session_start();
?>

<?php
//including the database server connection php file..
include_once('config.php');

$result2 = mysqli_query($mysqli, "SELECT * FROM staff WHERE staff_id=" . $_SESSION['id'] . "");

//if the update button is clicked..
if (isset($_POST['updatePersonalInfo'])) {
    $id = $_POST['id'];

    $staff_no = $_POST['staff_no'];
    $staff_username = $_POST['staff_username'];
    $staff_name = $_POST['staff_name'];
    $staff_email = $_POST['staff_email'];

    //updating lecturer's details into database..
    $result = mysqli_query($mysqli, "UPDATE staff SET staff_no ='$staff_no',staff_username ='$staff_username',staff_name='$staff_name',staff_email='$staff_email' WHERE staff_id=$id");

    //displays success message..
    echo
    "<script>
        window.alert('Your personal details was successfully updated!');
        window.location.href='staffMainPage.php';
    </script>";
}
?>
<html>
    <head>
        <title>Manage Personal Info Page</title>
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
        <?php
        while ($res = mysqli_fetch_array($result2)) {
            echo "<a href =\"staffChangePasswordPage.php?id=$res[staff_id]\"><button id=\"button\" style = \"width: 150px; float:right\">PASSWORD</button></a>";
        }
        ?>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:50%; background-color: white">
                <legend><b><font color='red'>Manage Personal Info</font></legend>
                <?php
                //getting id from url..
                $id = $_GET['id'];

                //selecting data associated with this particular id..
                $result = mysqli_query($mysqli, "SELECT * FROM staff WHERE staff_id=$id");
                while ($res = mysqli_fetch_array($result)) {
                    $staff_no = $res['staff_no'];
                    $staff_username = $res['staff_username'];
                    $staff_name = $res['staff_name'];
                    $staff_email = $res['staff_email'];
                }
                ?>

                <!-- html form where the lecturer's information will be updated -->
                <form method="POST" action="staffManagePersonalInfoPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Staff No : </td>
                            <td><input type='text' name='staff_no' value="<?php echo $staff_no; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Username : </td>
                            <td><input type='text' name='staff_username' value="<?php echo $staff_username; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Name : </td>
                            <td><input type='text' name='staff_name' value="<?php echo $staff_name; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Email ID : </td>
                            <td><input type='email' name='staff_email' value="<?php echo $staff_email; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td>
                            <td></td>
                        <tr>
                            <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
                            <td>
                                <input id="button" type="Submit" name="updatePersonalInfo" value="UPDATE" style="width: 120px"/> 
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



