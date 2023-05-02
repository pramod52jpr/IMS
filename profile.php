<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="profilePage">
    <?php
    $id=$_SESSION['Company_Id']?$_SESSION['Company_Id']:1;

    if(isset($_POST['companyName']) and $_POST['companyUsername']){
        $companyName=$_POST['companyName'];
        $companyContact=$_POST['companyContact'];
        $companyEmail=$_POST['companyEmail'];
        $companyAddress=$_POST['companyAddress'];
        $companyUsername=$_POST['companyUsername'];
        $companyPassword=$_POST['companyPassword'];
        $companyGst=$_POST['companyGst'];
        $companyPan=$_POST['companyPan'];
        $companyTan=$_POST['companyTan'];
        $companyLicence=$_POST['companyLicence'];
        $companyRgNo=$_POST['companyRgNo'];

        $comUpdateSql="update company set `Company_Name`='$companyName',`Company_Phone`='$companyContact',`Company_Email`='$companyEmail',`Company_Address`='$companyAddress',`Company_Username`='$companyUsername',`Company_Password`='$companyPassword',`Company_GST`='$companyGst',`Company_PAN`='$companyPan',`Company_TAN`='$companyTan',`Company_Licence`='$companyLicence',`Company_Registration`='$companyRgNo' where `Company_Id`=$id";
        $comUpdateResult=mysqli_query($conn,$comUpdateSql);
        if($comUpdateResult){
            echo "<script>alert('Profile Updated successfully')</script>";
        }else{
            echo "<script>alert('Profile not Updated')</script>";
        }
    }
    $comSql="select * from company where `Company_Id`=$id";
    $ComResult=mysqli_query($conn,$comSql);
    $conRow=mysqli_fetch_assoc($ComResult);
    ?>
    <h2>Company Master</h2>
    <form class="profileForm" action="profile.php" method="post">
        <h4>Company Details</h4>
        <label for="companyCode">Company Code</label>
        <input type="text" value="<?php echo $conRow['Company_Code'] ?>" name="companyCode" id="companyCode" disabled required>
        <label for="companyName">Company Name</label>
        <input type="text" value="<?php echo $conRow['Company_Name'] ?>" name="companyName" id="companyName" required>
        <label for="companyContact">Contact No.</label>
        <input type="tel"  value="<?php echo $conRow['Company_Phone'] ?>" name="companyContact" id="companyContact" required>
        <label for="companyEmail">Email Id</label>
        <input type="email"  value="<?php echo $conRow['Company_Email'] ?>" name="companyEmail" id="companyEmail" required>
        <label for="companyAddress">Address</label>
        <input type="text"  value="<?php echo $conRow['Company_Address'] ?>" name="companyAddress" id="companyAddress" required>
        <label for="companyUsername">Username</label>
        <input type="text"  value="<?php echo $conRow['Company_Username'] ?>" name="companyUsername" id="companyUsername" required>
        <label for="companyPassword">Password</label>
        <input type="text"  value="<?php echo $conRow['Company_Password'] ?>" name="companyPassword" id="companyPassword" required>
        <label for="companyGst">GST Number</label>
        <input type="text"  value="<?php echo $conRow['Company_GST'] ?>" name="companyGst" id="companyGst">
        <label for="companyPan">PAN Number</label>
        <input type="text"  value="<?php echo $conRow['Company_PAN'] ?>" name="companyPan" id="companyPan">
        <label for="companyTan">TAN Number</label>
        <input type="text"  value="<?php echo $conRow['Company_TAN'] ?>" name="companyTan" id="companyTan">
        <label for="companyLicence">Licence Number</label>
        <input type="text"  value="<?php echo $conRow['Company_Licence'] ?>" name="companyLicence" id="companyLicence">
        <label for="companyRgNo">Registration Number</label>
        <input type="text"  value="<?php echo $conRow['Company_Registration'] ?>" name="companyRgNo" id="companyRgNo">
        <div class="profileBtn">
            <input class="btn" type="submit" value="Save">
            <a class="btn" href="dashboard.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>