<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<?php
$id=$_SESSION['Company_Id']?$_SESSION['Company_Id']:1;
if(isset($_POST['username']) and isset($_POST['userPassword'])){
    $username=$_POST['username'];
    $userPassword=$_POST['userPassword'];
    $userPhone=$_POST['userPhone'];
    $userEmail=$_POST['userEmail'];

    $AdminCategory=isset($_POST['AdminCategory'])?$_POST['AdminCategory']:"";
    $productCategory=isset($_POST['productCategory'])?$_POST['productCategory']:"";
    $product=isset($_POST['product'])?$_POST['product']:"";
    $orders=isset($_POST['orders'])?$_POST['orders']:"";
    $branches=isset($_POST['branches'])?$_POST['branches']:"";
    $userPermit=$AdminCategory.$productCategory.$product.$orders.$branches;

    $addSql="insert into users(`Company_Code`,`Username`,`User_Password`,`User_Phone`,`User_Email`,`User_Permission`) values('$username','$userPassword','$userPhone','$userEmail','$userPermit')";
    $addResult=mysqli_query($conn,$addSql);
    if($addResult){
        echo "<script>alert('User Added Successfully')</script>";
    }else{
        echo "<script>alert('User not Added')</script>";
    }
}
if(isset($_POST['updatedUsername']) and isset($_POST['updateuid'])){
    $updateuid=$_POST['updateuid'];
    $updatedUsername=$_POST['updatedUsername'];
    $updatedUserPassword=$_POST['updatedUserPassword'];
    $updatedUserPhone=$_POST['updatedUserPhone'];
    $updatedUserEmail=$_POST['updatedUserEmail'];
    
    $updatedAdminCategory=isset($_POST['updatedAdminCategory'])?$_POST['updatedAdminCategory']:"";
    $updatedproductCategory=isset($_POST['updatedproductCategory'])?$_POST['updatedproductCategory']:"";
    $updatedproduct=isset($_POST['updatedproduct'])?$_POST['updatedproduct']:"";
    $updatedorders=isset($_POST['updatedorders'])?$_POST['updatedorders']:"";
    $updatedbranches=isset($_POST['updatedbranches'])?$_POST['updatedbranches']:"";
    $updatedUserPermit=$updatedAdminCategory.$updatedproductCategory.$updatedproduct.$updatedorders.$updatedbranches;

    $updateSql="update users set `Username`='$updatedUsername',`User_Password`='$updatedUserPassword',`User_Phone`='$updatedUserPhone',`User_Email`='$updatedUserEmail',`User_Permission`='$updatedUserPermit' where `User_Id`=$updateuid";
    $updateResult=mysqli_query($conn,$updateSql);
    if($updateResult){
        echo "<script>alert('User Updated Successfully')</script>";
    }else{
        echo "<script>alert('User not Updated')</script>";
    }
}
if(isset($_GET['duid'])){
    $duid=$_GET['duid'];
    $deleteSql="delete from users where `User_Id`=$duid";
    $deleteResult=mysqli_query($conn,$deleteSql);
    if($deleteResult){
        echo "<script>alert('User Deleted Successfully')</script>";
    }else{
        echo "<script>alert('User not Deleted')</script>";
    }
}

?>
<section class="myBranchPage">
    <h2>Users</h2>
    <div class="crudBtn">
        <div class="add">
            <a href="addUserForm.php">Add New</a>
        </div>
    </div>
    <div class="myBranchContainer">
        <table>
            <thead>
                <tr>
                    <th>Username</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from users";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Username'] ?></td>
                    <td><?php echo $row['User_Phone'] ?></td>
                    <td><?php echo $row['User_Email'] ?></td>
                    <td><a href="updateUserForm.php?uid=<?php echo $row['User_Id'] ?>">Edit</a><a href="users.php?duid=<?php echo $row['User_Id'] ?>">Delete</Button></a>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="5" style="text-align:center;font-size:20px">No User Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>