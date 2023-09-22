<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
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
            <a class="btn" href="javascript:history.go(-1)">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>