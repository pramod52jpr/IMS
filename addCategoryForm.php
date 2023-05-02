<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="addCategoryFormContainer">
    <form class="categoryAddForm" action="category.php" method="post">
    <div class="row">
    <div class="col-25">
        <label for="categoryName">Category Name</label>
    </div>
    <div class="col-25">
        <input class="addCategoryField" type="text" name="categoryName" id="categoryName" placeholder="Enter Category Name" required>
    </div>
    </div>
        <div class="addcategoryFormBtn">
            <input class="btn" type="submit" value="Add">
            <a class="btn" href="category.php">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>