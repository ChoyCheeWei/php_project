<?php
session_start();
?>

<?php
//including the database server connection php file..
include_once('config.php');

//if the login button is clicked
if (isset($_POST['login'])) {
    //receive all input values from login page
    $student_username = $_POST['student_username'];
    $student_password = $_POST['student_password'];

    $result = mysqli_query($mysqli, "SELECT * FROM student WHERE student_username='$student_username' AND student_password='$student_password'");
    $row = mysqli_fetch_assoc($result);
    if (is_array($row) && !empty($row)) {
        $_SESSION['id'] = $row['student_id'];
        $_SESSION['name'] = $row['student_name'];
        echo
        "<script>
            window.alert('Welcome to Student Appointment System!');
            window.location.href='userMainPage.php';
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
        <title>Student Login Page</title>
        <!-- Cascading Style Sheet -->
        <link rel="stylesheet" type="text/css" href="./css/W3.css">
        <script type="text/javascript">
            
            function checkForBlank() {
                var errorMessage ='';

                if (document.getElementById('student_username').value='') {
                    alert('Please enter your username');
                    document.getElementById('student_username').style.border
                }
            }
        </script>
    </head>
    <style>
        html{
            background: url(css/student.jpg) no-repeat center center fixed;
            background-size: 100% 100%;
        }
    </style>
    <div align="left" margin="2px">
        <a href="index.php"><button id="button" style="width: 125px">HOME</button></a>
    </div>
    <body>
        <div align='center' id="div">
            <fieldset style="width:50%; background-color: whitesmoke">
                <legend><b><font color='red'>Student Login</font></legend>
                <!-- html form where the username and password will be inserted -->
                <form method="POST" action="userLoginPage.php" onsubmit="return ">
                    <table class="center" border="0">
                        <tr>
                            <td><b>Username : </td>
                            <td><input type='text' name='student_username' placeholder=" Username" style="height: 30px; width: 250px"></td>
                        </tr>
                        <tr>
                            <td><b>Password : </td>
                            <td><input type='password' name='student_password' placeholder=" Password" style="height: 30px; width: 250px"></td>
                        </tr>
                        <tr>
                            <td>
                            <td></td>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input id="button" type="Submit" name="login" value="LOGIN" style="width: 120px"/> <input id="button" type="reset" value="RESET" style="width: 120px"/></td> 
                            </td>
                        </tr>
                    </table>
                    <p>
                        <font size="4" color="red"><strong>Not yet register ? </strong><a href="userRegisterPage.php"/>Click Here to Sign Up</a>
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

