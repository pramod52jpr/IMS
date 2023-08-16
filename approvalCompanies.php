<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php
if(isset($_GET['approve'])){
    $approve=$_GET['approve'];
    $ApprovelSql="update company set `Approvel`=1 where `Company_Id`=$approve";
    $ApprovelResult=mysqli_query($conn,$ApprovelSql);
    if($ApprovelResult){
        echo "<script>alert('Company Approved Successfully')</script>";
    }else{
        echo "<script>alert('Company not Approved')</script>";
    }
}
if(isset($_POST['user']) and isset($_POST['id'])){
    $id=$_POST['id'];
    $user=$_POST['user'];
    $userUpdateSql="update company set `userId`=$user where `Company_Id`=$id";
    $userUpdateResult=mysqli_query($conn,$userUpdateSql);
    if($userUpdateResult){
        echo "<script>alert('User Assigned Successfully')</script>";
    }else{
        echo "<script>alert('User Assignment Successfully')</script>";
    }
}
?>
<?php include "./components/header.php" ?>
<section class="companyPage">
    <div class="heading">
        <h2>Pending For Approval</h2>
    </div>
    <div class="companyContainer">
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Approve</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from company where `Approvel`=0 or `userId`=0";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Company_Name'] ?></td>
                    <td><?php echo $row['Company_Phone'] ?></td>
                    <td><?php echo $row['Company_Email'] ?></td>
                    <td><?php echo $row['Company_Address'] ?></td>
                    <td>
                        <?php
                            if($row['Approvel']==1){
                                $disables="pointer-events:none";
                            }else{
                                $disables="";
                            }
                        ?>
                        <a href="?approve=<?php echo $row['Company_Id'] ?>" style="background-color:blue;<?php echo $disables ?>">Approve</a>
                    </td>
                    <td>
                        <div class="user">
                            <?php
                                if($row['userId']!=0){
                                    $disabled="disabled";
                                }else{
                                    $disabled="";
                                }
                            ?>
                            <form action="approvalCompanies.php" method="post">
                                <input type="hidden" name="id" value="<?php echo $row['Company_Id'] ?>">
                                <select name="user" id="user" required <?php echo $disabled ?>>
                                    <option value="" selected disabled>Select User</option>
                                    <?php
                                    $userSql="select * from users";
                                    $userResult=mysqli_query($conn,$userSql);
                                    if(mysqli_num_rows($userResult)>0){
                                        while($userRow=mysqli_fetch_assoc($userResult)){
                                            if($userRow['User_Id']==$row['userId']){
                                                $selected="selected";
                                            }else{
                                                $selected="";
                                            }
                                        ?>
                                        <option value="<?php echo $userRow['User_Id'] ?>" <?php echo $selected ?>><?php echo $userRow['Username'] ?></option>
                                        <?php
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="save">
                                    <input type="submit" value="save" <?php echo $disabled ?>>
                                </div>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="10" style="text-align:center;font-size:20px">No Company Pending</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>