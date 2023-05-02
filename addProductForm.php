<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="addMachineFormContainer">
    <form class="machineAddForm" action="product.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-25">
        <label for="productName">Product Name</label>
        </div>
        <div class="col-25">
        <input type="text" name="productName" id="productName" required>
        </div>
        <div class="col-25">
        <label for="productModal">Modal No.</label>
        </div>
        <div class="col-25">
        <input type="text" name="productModal" id="productModal" required>
        </div>
        </div>
        <div class="row">
        <div class="col-25">
        <label for="productImg">Image</label>
        </div>
        <div class="col-25">
        <input type="file" name="productImg" id="productImg" accept="image/png,image/jpg,image/jpeg" required>
        </div>
        <div class="col-25">
        <label for="productQuantity">Quantity</label>
        </div>
        <div class="col-25">
        <input type="number" name="productQuantity" id="productQuantity" required>
        </div>
</div>
<div class="row4">
<div class="col-25 col-26">
        <label for="productCategory">Select Category</label>
</div>
<div class="col-25 col-26">
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
</div>
</div>
        <div class="addMachineFormBtn">
            <input class="btn" type="submit" value="Add">
            <a class="btn" href="product.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>