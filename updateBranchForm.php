<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="UpdateBranchFormContainer">
    <form class="branchUpdateForm" action="branch.php" method="post">
        <?php
            $bid=$_GET['bid'];
            $updateSql="select * from branch where `Branch_Id`=$bid";
            $updateResult=mysqli_query($conn,$updateSql);
            $UpdateRow=mysqli_fetch_assoc($updateResult);
        ?>
        <input type="hidden" name="updatebid" value="<?php echo $bid ?>">
        <div class="row">
        <div class="col-25">
        <label for="branchUpdatedName">Branch Name</label>
</div>
<div class="col-25">
        <input class="updateBranchField" type="text" value="<?php echo $UpdateRow['Branch_Name'] ?>" name="branchUpdatedName" id="branchUpdatedName" placeholder="Enter Category Name" required>
</div>
<div class="col-25">
        <label for="branchUpdatedPhone">Contact No.</label>
</div>
<div class="col-25">
        <input class="updateBranchField" type="number" value="<?php echo $UpdateRow['Branch_Phone'] ?>" name="branchUpdatedPhone" min="1000000000" max="9999999999" id="branchUpdatedPhone" placeholder="Enter Category Name" required>
</div>
</div>
<div class="row2">
<div class="col-25">
        <label for="branchUpdatedEmail">Email</label>
</div>
<div class="col-25">  
    <input class="updateBranchField" type="email" value="<?php echo $UpdateRow['Branch_Email'] ?>" name="branchUpdatedEmail" id="branchUpdatedEmail" placeholder="Enter Category Name" required>
</div>
<div class="col-25">  
        <label for="branchUpdatedAddress">Address</label>
</div>

<div class="col-25">
        <input class="updateBranchField" type="text" value="<?php echo $UpdateRow['Branch_Address'] ?>" name="branchUpdatedAddress" id="branchUpdatedAddress" placeholder="Enter Category Name" required>
</div>
</div>
        <div class="updatebranchFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="branch.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>