<?php
//including the database server connection php file..
include_once('config.php');

//if the register button is clicked..
if (isset($_POST['userRegister'])) {
    //receive all input values from the register form..
    $student_matric_no = $_POST['student_matric_no'];
    $student_username = $_POST['student_username'];
    $student_name = $_POST['student_name'];
    $student_email = $_POST['student_email'];
    $student_password = $_POST['student_password'];

    //check whether username is already exist or not...
    $user_check_query = "SELECT * FROM student WHERE student_matric_no='$student_matric_no' LIMIT 1";
    $result = mysqli_query($mysqli, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        if ($user['student_matric_no'] === $student_matric_no) {
            //displays error message..
            echo
            "<script>
                window.alert('This matric no is already exist!');
                window.location.href='userRegisterPage.php';
            </script>";
        }
    } else {
        //insert student's details into database..
        $result = mysqli_query($mysqli, "INSERT INTO student (student_username, student_matric_no, student_name, student_email, student_password) 
                                         VALUES('$student_username','$student_matric_no','$student_name','$student_email', '$student_password')");

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
        <title>Student Register Page</title>
        <!-- Cascading Style Sheet--> 
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
    </head>
    <style>
        html{
            background: url(css/student.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <div align="left" margin="2px">
        <a href="index.php"><button id="button" style="width: 120px">HOME</button></a>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:55%; background-color: whitesmoke">
                <legend><b><font color='red'>Student Registration Form</font></legend>
                <!-- html form where the student's information will be inserted -->
                <form method="POST" action="userRegisterPage.php">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Matric No : </td>
                            <td><input type='number' name='student_matric_no' placeholder=" Matric No" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Username : </td>
                            <td><input type='text' name='student_username' placeholder=" Username" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Name : </td>
                            <td><input type='text' name='student_name' placeholder=" Name" style="height: 30px; width: 250px" required=""></td>
                        </tr>
                        <tr>
                            <td><b>Email Address : </td>
                            <td><input type='email' name='student_email' placeholder=" Email Address" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td><b>Password : </td>
                            <td><input type='password' name='student_password' placeholder=" Password" style="height: 30px; width: 250px" required></td>
                        </tr>
                        <tr>
                            <td>
                            <td></td>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input id="button" type="Submit" name="userRegister" value="REGISTER" style="width: 120px"/> <input id="button" type="reset" value="RESET" style="width: 120px"/></td> 
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

