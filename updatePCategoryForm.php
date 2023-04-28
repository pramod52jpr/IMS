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
        <input type="hidden" name="updatepcid" value="<?php echo $pcid ?>">
        <label for="PCategoryUpdatedName">Product Name</label>
        <input type="text" value="<?php echo $UpdateRow['P_Category_Name'] ?>" name="PCategoryUpdatedName" id="PCategoryUpdatedName" required>
        <label for="PCategoryUpdatedImage">Image</label>
        <input type="file" name="PCategoryUpdatedImage" id="PCategoryUpdatedImage" accept="image/png,image/jpg,image/jpeg" required>
        <div class="updatePCategoryFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="PCategory.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>