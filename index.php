<?php include "conn.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioComplaints</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/login.css">
</head>
<body>
    <section class="loginPage">
        <div class="loginContainer">
            <div class="loginHeader">
                <div class="headerContent">
                    <h2>Cloud TA</h2>
                    <div>Time Attendence & Payroll System</div>
                </div>
                <div class="LoginPg">Log in to start your session</div>
            </div>
            <div class="formContainer">
                <div class="loginRegBtn">
                    <button id="loginBtn">Login</button>
                    <button id="regBtn">Registration</button>
                </div>
                <form id="form1" action="" method="post">
                    <?php
                        if(isset($_POST['lgCode']) and isset($_POST['lgUsername']) and isset($_POST['lgPassword'])){
                            $lgCode=$_POST['lgCode'];
                            $lgUsername=$_POST['lgUsername'];
                            $lgPassword=$_POST['lgPassword'];
                            $lgSql="select * from company where `Company_Code`=$lgCode and `Company_Username`='$lgUsername' and `Company_Password`='$lgPassword'";
                            $lgResult=mysqli_query($conn,$lgSql);
                            if(mysqli_num_rows($lgResult)>0){
                                $lgRow=mysqli_fetch_assoc($lgResult);
                                session_start();
                                $_SESSION['Company_Id']=$lgRow['Company_Id'];
                                $_SESSION['Company_Code']=$lgRow['Company_Code'];
                                Header("Location: dashboard.php");
                            }else{
                                $lgUserSql="select * from users where `Company_Code`=$lgCode and `Username`='$lgUsername' and `User_Password`='$lgPassword'";
                                $lgUserResult=mysqli_query($conn,$lgUserSql);
                                if(mysqli_num_rows($lgUserResult)>0){
                                    $lgUserRow=mysqli_fetch_assoc($lgUserResult);
                                    session_start();
                                    $_SESSION['User_Id']=$lgUserRow['User_Id'];
                                    $_SESSION['Company_Code']=$lgRow['Company_Code'];
                                    Header("Location: dashboard.php");
                                }else{
                                    echo "<script>alert('Wrong Username or Password')</script>";
                                }
                            }
                        }
                    ?>
                    <label for="lgCode">Company Code</label>
                    <input type="number" name="lgCode" id="lgCode" required>
                    <label for="lgUsername">Username</label>
                    <input type="text" name="lgUsername" id="lgUsername" required>
                    <label for="lgPassword">Password</label>
                    <input type="password" name="lgPassword" id="lgPassword" required>
                    <input class="button" type="submit" value="Log In">
                    <a href="#">Forgot Password?</a>
                </form>
                <form id="form2" action="index.php" method="post">
                    <?php
                        if(isset($_POST['rgUsername']) and isset($_POST['rgPassword'])){
                            $rgName=$_POST['rgName'];
                            $rgMobile=$_POST['rgMobile'];
                            $rgEmail=$_POST['rgEmail'];
                            $rgUsername=$_POST['rgUsername'];
                            $rgPassword=$_POST['rgPassword'];
                            $rgAddress=$_POST['rgAddress'];
                            $companyRgCode=mt_rand(111,999);

                            $rgConfirmSql="select `Company_Username`,`Company_Code` from company where `Company_Username`='$rgUsername' or `Company_Code`=$companyRgCode";
                            $rgConfirmResult=mysqli_query($conn,$rgConfirmSql);
                            if(mysqli_num_rows($rgConfirmResult)>0){
                                echo "<script>alert('This Username is already Registered! Please try different One')</script>";
                            }else{
                                $rgSql="insert into company(`Company_Name`,`Company_Phone`,`Company_Email`,`Company_Username`,`Company_Password`,`Company_Address`,`Company_Code`) values('$rgName','$rgMobile','$rgEmail','$rgUsername','$rgPassword','$rgAddress','$companyRgCode')";
                                $rgResult=mysqli_query($conn,$rgSql);
                                if($rgResult){
                                    echo "<script>alert('Registration Successful! Your Company Code is $companyRgCode')</script>";
                                }else{
                                    echo "<script>alert('Registration Unsuccessful! Please Try Again')</script>";
                                }
                            }
                        }
                    ?>
                    <label for="rgName">Company Name</label>
                    <input type="text" name="rgName" id="rgName" required>
                    <label for="rgEmail">Company Email</label>
                    <input type="email" name="rgEmail" id="rgEmail" required>
                    <label for="rgMobile">Company Mobile</label>
                    <input type="tel" name="rgMobile" id="rgMobile" maxlength="10" required>
                    <label for="rgUsername">Username</label>
                    <input type="text" name="rgUsername" id="rgUsername" required>
                    <label for="rgPassword">Password</label>
                    <input type="password" name="rgPassword" id="rgPassword" required>
                    <label for="rgAddress">Company Address</label>
                    <input type="text" name="rgAddress" id="rgAddress" required>
                    <input class="button" type="submit" value="Registration">
                </form>
            </div>
        </div>
    </section>
<script src="script/login.js"></script>
</body>
</html>