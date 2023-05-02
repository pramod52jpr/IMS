<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="addMachineFormContainer">
    <form class="machineAddForm" action="product.php" method="post" enctype="multipart/form-data">
        <label for="productName">Product Name</label>
        <input type="text" name="productName" id="productName" required>
        <label for="productModal">Modal No.</label>
        <input type="text" name="productModal" id="productModal" required>
        <label for="productImg">Image</label>
        <input type="file" name="productImg" id="productImg" accept="image/png,image/jpg,image/jpeg" required>
        <label for="productQuantity">Quantity</label>
        <input type="number" name="productQuantity" id="productQuantity" required>
        <label for="productNormalPrice">Normal Price</label>
        <input type="number" name="productNormalPrice" id="productNormalPrice" required>
        <label for="productDiscountedPrice">Discounted Price</label>
        <input type="number" name="productDiscountedPrice" id="productDiscountedPrice" required>
        <label for="productCategory">Select Category</label>
        <select name="productCategory" id="productCategory" required>
            <option value="" selected disabled>Select Category</option>
        <?php
        $pCatSql="select * from pro_category";
        $pCatResult=mysqli_query($conn,$pCatSql);
        if(mysqli_num_rows($pCatResult)>0){
            while($pCatRow=mysqli_fetch_assoc($pCatResult)){
        ?>
            <option value="<?php echo $pCatRow['P_Category_Id'] ?>"><?php echo $pCatRow['P_Category_Name'] ?></option>
        <?php
            }
        }
        ?>
        </select>
        <div class="addMachineFormBtn">
            <input class="btn" type="submit" value="Add">
            <a class="btn" href="product.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>