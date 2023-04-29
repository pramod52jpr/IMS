<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="UpdateMyBranchFormContainer">
    <form class="myBranchUpdateForm" action="users.php" method="post">
        <div class="row">
            <div class="col-25">
                <label for="userame">Username</label>
            </div>
            <div class="col-25">
                <input class="addBranchField" type="text" name="userame" id="userame" placeholder="Enter Username"
                    required>
            </div>
            <div class="col-25">
                <label for="userPassword">Password</label>
            </div>
            <div class="col-25">
                <input class="addBranchField" type="password" name="userPassword" id="userPassword"
                    placeholder="Enter Password" required>
            </div>
        </div>
        <div class="row2">
            <div class="col-25">
                <label for="userPhone">Contact No.</label>
            </div>
            <div class="col-25">
                <input class="addBranchField" type="text" maxlength="10" name="userPhone" id="userPhone"
                    placeholder="Enter Contact No.">
            </div>
            <div class="col-25">
                <label for="userEmail">Email</label>
            </div>
            <div class="col-25">
                <input class="addBranchField" type="email" name="userEmail" id="userEmail" placeholder="Enter Email">
            </div>
        </div>
        <div class="row2">
            <h2>Give Access</h2>
            <input type="checkbox" name="AdminCategory" id="AdminCategory" value="AdminCategory">
            <label for="AdminCategory">Admin Category</label>
            <input type="checkbox" name="productCategory" id="productCategory" value="productCategory">
            <label for="productCategory">Product Category</label>
            <input type="checkbox" name="product" id="product" value="product">
            <label for="product">Products</label>
            <input type="checkbox" name="orders" id="orders" value="orders">
            <label for="orders">Orders</label>
            <input type="checkbox" name="branches" id="branches" value="branches">
            <label for="branches">Branches</label>
        </div>
        <div class="updateMyBbranchFormBtn">
            <input class="btn" type="submit" value="Add">
            <a class="btn" href="users.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>