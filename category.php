<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php
if(isset($_POST['categoryName'])){
    $categoryName=$_POST['categoryName'];
    $addSql="insert into category(`Category_Name`) values('$categoryName')";
    $addResult=mysqli_query($conn,$addSql);
    if($addResult){
        echo "<script>alert('Category Added Successfully')</script>";
    }else{
        echo "<script>alert('Category not Added')</script>";
    }
}
if(isset($_POST['categoryUpdatedName']) and isset($_POST['updateCid'])){
    $updateCid=$_POST['updateCid'];
    $categoryUpdatedName=$_POST['categoryUpdatedName'];
    $updateSql="update category set `Category_Name`='$categoryUpdatedName' where `Category_Id`=$updateCid";
    $updateResult=mysqli_query($conn,$updateSql);
    if($updateResult){
        echo "<script>alert('Category Updated Successfully')</script>";
    }else{
        echo "<script>alert('Category not Updated')</script>";
    }
}
if(isset($_GET['dcid'])){
    $dcid=$_GET['dcid'];
    $deleteSql="delete from category where `Category_Id`=$dcid";
    $deleteResult=mysqli_query($conn,$deleteSql);
    if($deleteResult){
        echo "<script>alert('Category Deleted Successfully')</script>";
    }else{
        echo "<script>alert('Category not Deleted')</script>";
    }
}

?>
<?php include "./components/header.php" ?>
<section class="categoryPage">
    <h2>Category</h2>
    <div class="crudBtn">
        <div class="add">
            <a href="addCategoryForm.php">Add New</a>
        </div>
    </div>
    <div class="categoryContainer">
        <table>
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from category";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Category_Name'] ?></td>
                    <td><a href="updateCategoryForm.php?cid=<?php echo $row['Category_Id'] ?>">Edit</a><a href="category.php?dcid=<?php echo $row['Category_Id'] ?>">Delete</Button></a>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>