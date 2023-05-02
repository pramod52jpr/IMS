<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="addMyBranchFormContainer">
    <form class="myBranchAddForm" action="myBranch.php" method="post">
    <div class="row">
    <div class="col-25">
        <label for="branchName">Branch Name</label>
</div>
<div class="col-25">
        <input class="addBranchField" type="text" name="branchName" id="branchName" placeholder="Enter Branch Name" required>
</div>
<div class="col-25">
        <label for="branchPhone">Contact No.</label>
</div>
<div class="col-25">
        <input class="addBranchField" type="number" name="branchPhone" min="1000000000" max="9999999999" id="branchPhone" placeholder="Enter Contact No." required>
</div>
</div>
<div class="row2">
<div class="col-25">
        <label for="branchEmail">Email</label>
</div>
<div class="col-25">
        <input class="addBranchField" type="email" name="branchEmail" id="branchEmail" placeholder="Enter Email Id" required>
</div>
<div class="col-25">
        <label for="branchAddress">Address</label>
</div>
<div class="col-25">
        <input class="addBranchField" type="text" name="branchAddress" id="branchAddress" placeholder="Enter branch Address" required>
</div>
</div>
        <div class="addMyBranchFormBtn">
            <input class="btn" type="submit" value="Add">
            <a class="btn" href="myBranch.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>