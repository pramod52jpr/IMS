<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="UpdateMachineFormContainer">
    <form class="machineUpdateForm" action="product.php" method="post" enctype="multipart/form-data">
        <?php
            $pid=$_GET['pid'];
            $updateSql="select * from product where `Product_Id`=$pid";
            $updateResult=mysqli_query($conn,$updateSql);
            $UpdateRow=mysqli_fetch_assoc($updateResult);
        ?><div class="row">
        <input type="hidden" name="updatepid" value="<?php echo $pid ?>">
        <div class="col-25">
        <label for="productUpdatedName">Product Name</label>
        </div>
        <div class="col-25">
        <input type="text" value="<?php echo $UpdateRow['Product_Name'] ?>" name="productUpdatedName" id="productUpdatedName" required>
        </div>
        <div class="col-25">
        <label for="productUpdatedModal">Modal No.</label>
        </div>
        <div class="col-25">
        <input type="text" value="<?php echo $UpdateRow['Product_Modal_No'] ?>" name="productUpdatedModal" id="productUpdatedModal" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
        <label for="productUpdatedImage">Image</label>
        </div>
        <div class="col-25">
        <input type="file" name="productUpdatedImage" id="productUpdatedImage" accept="image/png,image/jpg,image/jpeg" required>
        </div>
        <div class="col-25">
        <label for="productUpdatedQuantity">Quantity</label>
        </div>
        <div class="col-25">
        <input type="number" value="<?php echo $UpdateRow['Quantity'] ?>" name="productUpdatedQuantity" id="productUpdatedQuantity" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
        <label for="productUpdatedNormalPrice">Normal Price</label>
        </div>
        <div class="col-25">
        <input type="number" value="<?php echo $UpdateRow['Normal_Price'] ?>" name="productUpdatedNormalPrice" id="productUpdatedNormalPrice" required>
        </div>
        <div class="col-25">
        <label for="productUpdatedDiscountedPrice">Discounted Price</label>
        </div>
        <div class="col-25">
        <input type="number" value="<?php echo $UpdateRow['Discounted_Price'] ?>" name="productUpdatedDiscountedPrice" id="productUpdatedDiscountedPrice" required>
        </div>
        </div>
        <div class="row4">
        <div class="col-25 col-26">
        <label for="productUpdatedCategory">Select Category</label>
        </div>
        <div class="col-25 col-26">
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
        </div>
        </div>
        <div class="updateMachineFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="product.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>