<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}elseif(isset($_SESSION['User_Id'])){
    Header("Location: dashboard.php");
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
if(isset($_GET['comactive'])){
    $comactive=$_GET['comactive'];
    $comactiveSql="update company set `Active_Status`=0 where `Company_Id`=$comactive";
    $comactiveResult=mysqli_query($conn,$comactiveSql);
    if($comactiveResult){
        echo "<script>alert('Company Deactivated Successfully')</script>";
    }else{
        echo "<script>alert('Company not Deactivated')</script>";
    }
}
if(isset($_GET['comdeactive'])){
    $comdeactive=$_GET['comdeactive'];
    $comdeactiveSql="update company set `Active_Status`=1 where `Company_Id`=$comdeactive";
    $comdeactiveResult=mysqli_query($conn,$comdeactiveSql);
    if($comdeactiveResult){
        echo "<script>alert('Company Activated Successfully')</script>";
    }else{
        echo "<script>alert('Company not Activated')</script>";
    }
}
?>
<?php include "./components/header.php" ?>
<section class="companyPage">
    <div class="heading">
        <h2>Company Master</h2>
        <div class="search">
            <form action="" method="get">
                <input type="text" value="<?php echo isset($_GET['search'])?$_GET['search']:(isset($_POST['search'])?$_POST['search']:'') ?>" name="search" id="search">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>
    <div class="companyContainer">
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Admin Type</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['search']) or isset($_POST['search'])){
                    $search=isset($_GET['search'])?$_GET['search']:$_POST['search'];
                    $sql="select * from company join category on company.`Admin_Type`=category.`Category_Id` where `Approvel`=1 and `Company_Name` like '%$search%'";
                }else{
                    $sql="select * from company join category on company.`Admin_Type`=category.`Category_Id` where `Approvel`=1";
                }
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
                    <td>
                    <?php
                        if($row['Admin_Type']==1){
                            $disables="pointer-events:none";
                        }else{
                            $disables="";
                        }
                    ?>
                    <?php
                    if(isset($_GET['search']) or isset($_POST['search'])){
                        $getSearch="search=$search&";
                    }else{
                        $getSearch="";
                    }
                    if($row['Active_Status']==1){   
                    ?>
                        <a href="?<?php echo $getSearch ?>comactive=<?php echo $row['Company_Id'] ?>" style="background-color:blue;<?php echo $disables ?>"><?php echo "Active" ?></a>
                    <?php
                    }else{
                    ?>
                        <a href="?<?php echo $getSearch ?>comdeactive=<?php echo $row['Company_Id'] ?>" style="background-color:grey"><?php echo "Deactive" ?></a>
                    <?php
                    }
                    ?>
                    </td>
                    <td>
                        <?php
                        if($row['Admin_Type']==1){
                            $disable="style='pointer-events:none;background:grey'";
                        }else{
                            $disable="";
                        }
                        ?>
                        <a href="updateCompanyForm.php?<?php echo $getSearch ?>comId=<?php echo $row['Company_Id'] ?>">Edit</a>
                        <a href="company.php?<?php echo $getSearch ?>dcomId=<?php echo $row['Company_Id'] ?>" <?php echo $disable ?> style="background-color:red">Delete</a>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="10" style="text-align:center;font-size:20px">No Company Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>