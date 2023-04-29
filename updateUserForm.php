<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="UpdateMyBranchFormContainer">
    <form class="myBranchUpdateForm" action="users.php" method="post">
        <?php
        $uid = $_GET['uid'];
        $updateSql = "select * from users where `User_Id`=$uid";
        $updateResult = mysqli_query($conn, $updateSql);
        $UpdateRow = mysqli_fetch_assoc($updateResult);
        ?>
        <input type="hidden" name="updateuid" value="<?php echo $uid ?>">
        <div class="row">
            <div class="col-25">
                <label for="updatedUsername">Username</label>
            </div>
            <div class="col-25">
                <input class="updateBranchField" type="text" value="<?php echo $UpdateRow['Username'] ?>"
                    name="updatedUsername" id="updatedUsername" placeholder="Enter Username" required>
            </div>
            <div class="col-25">
                <label for="updatedUserPassword">Password</label>
            </div>
            <div class="col-25">
                <input class="updateBranchField" type="password" value="<?php echo $UpdateRow['User_Password'] ?>"
                    name="updatedUserPassword" id="updatedUserPassword" placeholder="Enter Password" required>
            </div>
        </div>
        <div class="row2">
            <div class="col-25">
                <label for="updatedUserPhone">Contact No.</label>
            </div>
            <div class="col-25">
                <input class="updateBranchField" type="text" value="<?php echo $UpdateRow['User_Phone'] ?>"
                    name="updatedUserPhone" id="updatedUserPhone" maxlength="10" placeholder="Enter Contact No.">
            </div>
            <div class="col-25">
                <label for="updatedUserEmail">Email</label>
            </div>
            <div class="col-25">
                <input class="updateBranchField" type="email" value="<?php echo $UpdateRow['User_Email'] ?>" 
                    name="updatedUserEmail" id="updatedUserEmail" placeholder="Enter Email">
            </div>
        </div>
        <div class="row2">
            <?php
            $AdminCategoryChecked=str_contains($UpdateRow['User_Permission'],"AdminCategory")?"checked":"";
            $productCategoryChecked=str_contains($UpdateRow['User_Permission'],"productCategory")?"checked":"";
            $productChecked=str_contains($UpdateRow['User_Permission'],"product")?"checked":"";
            $ordersChecked=str_contains($UpdateRow['User_Permission'],"orders")?"checked":"";
            $branchesChecked=str_contains($UpdateRow['User_Permission'],"branches")?"checked":"";
            ?>
            <h2>Give Access</h2>
            <input type="checkbox"  name="updatedAdminCategory" id="updatedAdminCategory" value="AdminCategory" <?php echo $AdminCategoryChecked ?>>
            <label for="updatedAdminCategory">Admin Category</label>
            <input type="checkbox" name="updatedproductCategory" id="updatedproductCategory" value="productCategory"<?php echo $productCategoryChecked ?>>
            <label for="updatedproductCategory">Product Category</label>
            <input type="checkbox" name="updatedproduct" id="updatedproduct" value="product"<?php echo $productChecked ?>>
            <label for="updatedproduct">Products</label>
            <input type="checkbox" name="updatedorders" id="updatedorders" value="orders"<?php echo $ordersChecked ?>>
            <label for="updatedorders">Orders</label>
            <input type="checkbox" name="updatedbranches" id="updatedbranches" value="branches"<?php echo $branchesChecked ?>>
            <label for="updatedbranches">Branches</label>
        </div>
        <div class="updateMyBbranchFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="users.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>