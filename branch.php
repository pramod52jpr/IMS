<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<?php
if(isset($_POST['branchUpdatedName']) and isset($_POST['updatebid'])){
    $updatebid=$_POST['updatebid'];
    $branchUpdatedName=$_POST['branchUpdatedName'];
    $branchUpdatedPhone=$_POST['branchUpdatedPhone'];
    $branchUpdatedEmail=$_POST['branchUpdatedEmail'];
    $branchUpdatedAddress=$_POST['branchUpdatedAddress'];
    $updateSql="update branch set `Branch_Name`='$branchUpdatedName',`Branch_Phone`='$branchUpdatedPhone',`Branch_Email`='$branchUpdatedEmail',`Branch_Address`='$branchUpdatedAddress' where `Branch_Id`=$updatebid";
    $updateResult=mysqli_query($conn,$updateSql);
    if($updateResult){
        echo "<script>alert('Branch Updated Successfully')</script>";
    }else{
        echo "<script>alert('Branch not Updated')</script>";
    }
}
if(isset($_GET['dbid'])){
    $dbid=$_GET['dbid'];
    $deleteSql="delete from branch where `Branch_Id`=$dbid";
    $deleteResult=mysqli_query($conn,$deleteSql);
    if($deleteResult){
        echo "<script>alert('Branch Deleted Successfully')</script>";
    }else{
        echo "<script>alert('Branch not Deleted')</script>";
    }
}

?>
<section class="branchPage">
    <h2>Branch</h2>
    <div class="branchContainer">
        <table>
            <thead>
                <tr>
                    <th>Branch Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Company</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from branch join company where branch.`Company_Id`=company.`Company_Id`";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Branch_Name'] ?></td>
                    <td><?php echo $row['Branch_Phone'] ?></td>
                    <td><?php echo $row['Branch_Email'] ?></td>
                    <td><?php echo $row['Branch_Address'] ?></td>
                    <td><?php echo $row['Company_Name'] ?></td>
                    <td><a href="updateBranchForm.php?bid=<?php echo $row['Branch_Id'] ?>">Edit</a><a href="branch.php?dbid=<?php echo $row['Branch_Id'] ?>">Delete</Button></a>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="6" style="text-align:center;font-size:20px">No Branch Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>