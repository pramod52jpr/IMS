<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<?php
$id=$_SESSION['Company_Id']?$_SESSION['Company_Id']:1;
if(isset($_POST['branchName']) and isset($_POST['branchPhone'])){
    $branchName=$_POST['branchName'];
    $branchPhone=$_POST['branchPhone'];
    $branchEmail=$_POST['branchEmail'];
    $branchAddress=$_POST['branchAddress'];
    $addSql="insert into branch(`Branch_Name`,`Branch_Phone`,`Branch_Email`,`Branch_Address`,`Company_Id`) values('$branchName','$branchPhone','$branchEmail','$branchAddress',$id)";
    $addResult=mysqli_query($conn,$addSql);
    if($addResult){
        echo "<script>alert('Branch Added Successfully')</script>";
    }else{
        echo "<script>alert('Branch not Added')</script>";
    }
}
if(isset($_POST['branchUpdatedName']) and isset($_POST['updatembid'])){
    $updatembid=$_POST['updatembid'];
    $branchUpdatedName=$_POST['branchUpdatedName'];
    $branchUpdatedPhone=$_POST['branchUpdatedPhone'];
    $branchUpdatedEmail=$_POST['branchUpdatedEmail'];
    $branchUpdatedAddress=$_POST['branchUpdatedAddress'];
    $updateSql="update branch set `Branch_Name`='$branchUpdatedName',`Branch_Phone`='$branchUpdatedPhone',`Branch_Email`='$branchUpdatedEmail',`Branch_Address`='$branchUpdatedAddress' where `Branch_Id`=$updatembid";
    $updateResult=mysqli_query($conn,$updateSql);
    if($updateResult){
        echo "<script>alert('Branch Updated Successfully')</script>";
    }else{
        echo "<script>alert('Branch not Updated')</script>";
    }
}
if(isset($_GET['dmbid'])){
    $dmbid=$_GET['dmbid'];
    $deleteSql="delete from branch where `Branch_Id`=$dmbid";
    $deleteResult=mysqli_query($conn,$deleteSql);
    if($deleteResult){
        echo "<script>alert('Branch Deleted Successfully')</script>";
    }else{
        echo "<script>alert('Branch not Deleted')</script>";
    }
}

?>
<section class="myBranchPage">
    <h2>My Branches</h2>
    <div class="crudBtn">
        <div class="add">
            <a href="addMyBranchForm.php">Add New</a>
            <hr class="hrline"></hr>
        </div>
    </div>
    <div class="myBranchContainer">
        <table>
            <thead>
                <tr>
                    <th>Branch Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from branch where `Company_Id`=$id";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Branch_Name'] ?></td>
                    <td><?php echo $row['Branch_Phone'] ?></td>
                    <td><?php echo $row['Branch_Email'] ?></td>
                    <td><?php echo $row['Branch_Address'] ?></td>
                    <td><a href="updateMyBranchForm.php?mbid=<?php echo $row['Branch_Id'] ?>">Edit</a><a href="myBranch.php?dmbid=<?php echo $row['Branch_Id'] ?>">Delete</Button></a>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="5" style="text-align:center;font-size:20px">No Branch Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>