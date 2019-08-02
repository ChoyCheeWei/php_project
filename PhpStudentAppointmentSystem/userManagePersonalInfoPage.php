<?php
session_start();
?>

<?php
//including the database server connection php file..
include_once('config.php');

$result2 = mysqli_query($mysqli, "SELECT * FROM student WHERE student_id=" . $_SESSION['id'] . "");

//if the update button is clicked..
if (isset($_POST['updatePersonalInfo'])) {
    $id = $_POST['id'];

    $student_username = $_POST['student_username'];
    $student_matric_no = $_POST['student_matric_no'];
    $student_name = $_POST['student_name'];
    $student_surname = $_POST['student_surname'];
    $student_email = $_POST['student_email'];
    $student_mobile_no = $_POST['student_mobile_no'];
    $student_address = $_POST['student_address'];

    //updating student's details into database..
    $result = mysqli_query($mysqli, "UPDATE student SET student_username='$student_username',student_matric_no='$student_matric_no',student_name='$student_name',student_surname='$student_surname',student_email='$student_email',"
            . "student_mobile_no='$student_mobile_no',student_address='$student_address' WHERE student_id=$id");

    //displays success message..
    echo
    "<script>
        window.alert('Your personal info was successfully updated!');
        window.location.href='userMainPage.php';
    </script>";
}
?>
<html>
    <head>
        <title>Manage Personal Info Page</title>
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
        <?php
        while ($res = mysqli_fetch_array($result2)) {
            echo "<a href =\"userChangePasswordPage.php?id=$res[student_id]\"><button id=\"button\" style = \"width: 150px; float:right\">PASSWORD</button></a>";
        }
        ?>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:58%; background-color: whitesmoke">
                <legend><b><font color='red'>Manage Personal Info</font></legend>
                <?php
                //getting id from url..
                $id = $_GET['id'];

                //selecting data associated with this particular id..
                $result = mysqli_query($mysqli, "SELECT * FROM student WHERE student_id=$id");
                while ($res = mysqli_fetch_array($result)) {
                    $student_id = $res['student_id'];
                    $student_username = $res['student_username'];
                                        $student_matric_no = $res['student_matric_no'];
                    $student_name = $res['student_name'];
                    $student_surname = $res['student_surname'];
                    $student_email = $res['student_email'];
                    $student_mobile_no = $res['student_mobile_no'];
                    $student_address = $res['student_address'];
                }
                ?>

                <!-- html form where the student's information will be updated -->
                <form method="POST" action="userManagePersonalInfoPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Matric No : </td>
                            <td><input type='number' name='student_matric_no' value="<?php echo $student_matric_no; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Username : </td>
                            <td><input type='text' name='student_username' value="<?php echo $student_username; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Name : </td>
                            <td><input type='text' name='student_name' value="<?php echo $student_name; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Surname : </td>
                            <td><input type='text' name='student_surname' value="<?php echo $student_surname; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Email Address : </td>
                            <td><input type='email' name='student_email' value="<?php echo $student_email; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Mobile No : </td>
                            <td><input type='number' name='student_mobile_no' value="<?php echo $student_mobile_no; ?>" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Home Address : </td>
                            <td><textarea name='student_address' style="height: 50px; width: 250px" required><?php echo $student_address; ?></textarea></td>
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

