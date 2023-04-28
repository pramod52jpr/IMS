<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="UpdateCategoryFormContainer">
    <form class="categoryUpdateForm" action="category.php" method="post">
        <label for="categoryUpdatedName">Category Name</label>
        <?php
            $cid=$_GET['cid'];
            $updateSql="select * from category where `Category_Id`=$cid";
            $updateResult=mysqli_query($conn,$updateSql);
            $UpdateRow=mysqli_fetch_assoc($updateResult);
        ?>
        <input type="hidden" name="updateCid" value="<?php echo $cid ?>">
        <input class="updateCategoryField" type="text" value="<?php echo $UpdateRow['Category_Name'] ?>" name="categoryUpdatedName" id="categoryUpdatedName" placeholder="Enter Category Name" required>
        <div class="updatecategoryFormBtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="category.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>