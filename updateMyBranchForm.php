<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="UpdateMyBranchFormContainer">
    <form class="myBranchUpdateForm" action="myBranch.php" method="post">
        <?php
            $mbid=$_GET['mbid'];
            $updateSql="select * from branch where `Branch_Id`=$mbid";
            $updateResult=mysqli_query($conn,$updateSql);
            $UpdateRow=mysqli_fetch_assoc($updateResult);
        ?><input type="hidden" name="updatembid" value="<?php echo $mbid ?>">
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
        <div class="updateMyBbranchFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="javascript:history.go(-1)">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>