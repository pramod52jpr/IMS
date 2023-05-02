<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="UpdateMachineFormContainer">
    <form class="machineUpdateForm" action="product.php" method="post" enctype="multipart/form-data">
        <?php
            $pid=$_GET['pid'];
            $updateSql="select * from product where `Product_Id`=$pid";
            $updateResult=mysqli_query($conn,$updateSql);
            $UpdateRow=mysqli_fetch_assoc($updateResult);
        ?>
        <input type="hidden" name="updatepid" value="<?php echo $pid ?>">
        <label for="productUpdatedName">Product Name</label>
        <input type="text" value="<?php echo $UpdateRow['Product_Name'] ?>" name="productUpdatedName" id="productUpdatedName" required>
        <label for="productUpdatedModal">Modal No.</label>
        <input type="text" value="<?php echo $UpdateRow['Product_Modal_No'] ?>" name="productUpdatedModal" id="productUpdatedModal" required>
        <label for="productUpdatedImage">Image</label>
        <input type="file" name="productUpdatedImage" id="productUpdatedImage" accept="image/png,image/jpg,image/jpeg" required>
        <label for="productUpdatedQuantity">Quantity</label>
        <input type="number" value="<?php echo $UpdateRow['Quantity'] ?>" name="productUpdatedQuantity" id="productUpdatedQuantity" required>
        <label for="productUpdatedNormalPrice">Normal Price</label>
        <input type="number" value="<?php echo $UpdateRow['Normal_Price'] ?>" name="productUpdatedNormalPrice" id="productUpdatedNormalPrice" required>
        <label for="productUpdatedDiscountedPrice">Discounted Price</label>
        <input type="number" value="<?php echo $UpdateRow['Discounted_Price'] ?>" name="productUpdatedDiscountedPrice" id="productUpdatedDiscountedPrice" required>
        <label for="productUpdatedCategory">Select Category</label>
        <select name="productUpdatedCategory" id="productCategory" required>
            <option value="" disabled>Select Category</option>
        <?php
        $pCatSql="select * from pro_category";
        $pCatResult=mysqli_query($conn,$pCatSql);
        if(mysqli_num_rows($pCatResult)>0){
            while($pCatRow=mysqli_fetch_assoc($pCatResult)){
                if($pCatRow['P_Category_Id']==$UpdateRow['P_Category_Id']){
                    $selected="selected";
                }else{
                    $selected="";
                }
        ?>
            <option value="<?php echo $pCatRow['P_Category_Id'] ?>" <?php echo $selected ?>><?php echo $pCatRow['P_Category_Name'] ?></option>
        <?php
            }
        }
        ?>
        </select>
        <div class="updateMachineFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="product.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>