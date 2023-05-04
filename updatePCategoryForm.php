<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="UpdatePCategoryFormContainer">
    <form class="PCategoryUpdateForm" action="PCategory.php" method="post" enctype="multipart/form-data">
        <?php
            $pcid=$_GET['pcid'];
            $updateSql="select * from pro_category where `P_Category_Id`=$pcid";
            $updateResult=mysqli_query($conn,$updateSql);
            $UpdateRow=mysqli_fetch_assoc($updateResult);
        ?>
        <div class="row">
        <input type="hidden" name="updatepcid" value="<?php echo $pcid ?>">
        <div class="col-25">
        <label for="PCategoryUpdatedName">Product Name</label>
        </div>
        <div class="col-25">
        <input type="text" value="<?php echo $UpdateRow['P_Category_Name'] ?>" name="PCategoryUpdatedName" id="PCategoryUpdatedName" required>
        </div>
        <div class="col-25">
        <label for="PCategoryUpdatedImage">Image</label>
        </div>
        <div class="col-25">
        <input type="file" name="PCategoryUpdatedImage" id="PCategoryUpdatedImage" accept="image/png,image/jpg,image/jpeg" required>
        </div>
        </div>
        <div class="updatePCategoryFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="PCategory.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>