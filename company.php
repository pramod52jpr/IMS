<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php
if(isset($_POST['companyName']) and $_POST['companyUsername']){
    $comId=$_POST['comId'];
    $companyName=$_POST['companyName'];
    $companyCategory=$_POST['companyCategory'];
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
    
    $comUpdateSql="update company set `Company_Name`='$companyName',`Admin_Type`='$companyCategory',`Company_Phone`='$companyContact',`Company_Email`='$companyEmail',`Company_Address`='$companyAddress',`Company_Username`='$companyUsername',`Company_Password`='$companyPassword',`Company_GST`='$companyGst',`Company_PAN`='$companyPan',`Company_TAN`='$companyTan',`Company_Licence`='$companyLicence',`Company_Registration`='$companyRgNo' where `Company_Id`=$comId";
    $comUpdateResult=mysqli_query($conn,$comUpdateSql);
    if($comUpdateResult){
        echo "<script>alert('Details Updated successfully')</script>";
    }else{
        echo "<script>alert('Details not Updated')</script>";
    }
}
if(isset($_GET['dcomId'])){
    $dcomId=$_GET['dcomId'];
    $deleteSql="delete from company where `Company_Id`=$dcomId";
    $deleteResult=mysqli_query($conn,$deleteSql);
    if($deleteResult){
        echo "<script>alert('Company Deleted Successfully')</script>";
    }else{
        echo "<script>alert('Company not Deleted')</script>";
    }
}

?>
<?php include "./components/header.php" ?>
<section class="companyPage">
    <h2>Company Master</h2>
    <div class="companyContainer">
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Admin Type</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from company join category on company.`Admin_Type`=category.`Category_Id`";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Company_Name'] ?></td>
                    <td><?php echo $row['Category_Name'] ?></td>
                    <td><?php echo $row['Company_Phone'] ?></td>
                    <td><?php echo $row['Company_Email'] ?></td>
                    <td><?php echo $row['Company_Address'] ?></td>
                    <td><a href="updateCompanyForm.php?comId=<?php echo $row['Company_Id'] ?>">Edit</a><a href="company.php?dcomId=<?php echo $row['Company_Id'] ?>">Delete</Button></a>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="5" style="text-align:center;font-size:20px">No Machines Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>