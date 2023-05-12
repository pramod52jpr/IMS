<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="addPCategoryFormContainer">

    <form class="PCategoryAddForm" action="PCategory.php" method="post" enctype="multipart/form-data">
    <div class="row">
<div class="col-25">
        <label for="PCategoryName">Product Category Name</label>
</div>
<div class="col-25">
        <input type="text" name="PCategoryName" id="PCategoryName" required>
</div>
<div class="col-25">
        <label for="PCategoryImg">Image</label>
</div>
<div class="col-25">
        <input type="file" name="PCategoryImg" id="PCategoryImg" accept="image/png,image/jpg,image/jpeg" required>
        </div>
    </div>
        <div class="addPCategoryFormBtn">
            <input class="btn" type="submit" value="Add">
            <a class="btn" href="PCategory.php">Cancel</a>
        </div>

    </form>
</section>
<?php include "./components/footer.php" ?>