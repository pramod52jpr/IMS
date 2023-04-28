<?php include "conn.php" ?>
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
        <label for="branchUpdatedName">Branch Name</label>
        <input class="updateBranchField" type="text" value="<?php echo $UpdateRow['Branch_Name'] ?>" name="branchUpdatedName" id="branchUpdatedName" placeholder="Enter Category Name" required>
        <label for="branchUpdatedPhone">Contact No.</label>
        <input class="updateBranchField" type="number" value="<?php echo $UpdateRow['Branch_Phone'] ?>" name="branchUpdatedPhone" min="1000000000" max="9999999999" id="branchUpdatedPhone" placeholder="Enter Category Name" required>
        <label for="branchUpdatedEmail">Email</label>
        <input class="updateBranchField" type="email" value="<?php echo $UpdateRow['Branch_Email'] ?>" name="branchUpdatedEmail" id="branchUpdatedEmail" placeholder="Enter Category Name" required>
        <label for="branchUpdatedAddress">Address</label>
        <input class="updateBranchField" type="text" value="<?php echo $UpdateRow['Branch_Address'] ?>" name="branchUpdatedAddress" id="branchUpdatedAddress" placeholder="Enter Category Name" required>
        <div class="updatebranchFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="branch.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>