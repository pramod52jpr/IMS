<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<?php
if(isset($_POST['PCategoryName']) and isset($_FILES['PCategoryImg'])){
    $PCategoryName=$_POST['PCategoryName'];
    $image=$_FILES['PCategoryImg'];
        $tmp_name=$image['tmp_name'];
        $img_name=$image['name'];
    move_uploaded_file($tmp_name,"./uploadImages/$img_name");

    $addSql="insert into pro_category(`P_Category_Name`,`P_Category_Image`) values('$PCategoryName','$img_name')";
    $addResult=mysqli_query($conn,$addSql);
    if($addResult){
        echo "<script>alert('Category Added Successfully')</script>";
    }else{
        echo "<script>alert('Category not Added')</script>";
    }
}
if(isset($_POST['PCategoryUpdatedName']) and isset($_POST['updatepcid'])){
    $updatepcid=$_POST['updatepcid'];
    $PCategoryUpdatedName=$_POST['PCategoryUpdatedName'];
    $updateImage=$_FILES['PCategoryUpdatedImage'];
        $updated_tmp_name=$updateImage['tmp_name'];
        $updated_img_name=$updateImage['name'];
    move_uploaded_file($updated_tmp_name,"./uploadImages/$updated_img_name");
    $updateSql="update pro_category set `P_Category_Name`='$PCategoryUpdatedName',`P_Category_Image`='$updated_img_name' where `P_Category_Id`=$updatepcid";
    $updateResult=mysqli_query($conn,$updateSql);
    if($updateResult){
        echo "<script>alert('Category Updated Successfully')</script>";
    }else{
        echo "<script>alert('Category not Updated')</script>";
    }
}
if(isset($_GET['dpcid'])){
    $dpcid=$_GET['dpcid'];
    // $PCategoryImageSql="select `P_Category_Image` from pro_category where `P_Category_Id`=$dpcid";
    // $PCategoryImageResult=mysqli_query($conn,$PCategoryImageSql);
    // $PCategoryImageRow=mysqli_fetch_assoc($PCategoryImageResult);
    // $PCategoryImage=$PCategoryImageRow['P_Category_Image'];
    // unlink("./uploadImages/$PCategoryImage");
    $deleteSql="delete from pro_category where `P_Category_Id`=$dpcid";
    $deleteResult=mysqli_query($conn,$deleteSql);

    // $PCategoryImageSql2="select `Product_Img` from product where `P_Category_Id`=$dpcid";
    // $PCategoryImageResult2=mysqli_query($conn,$PCategoryImageSql2);
    // if(mysqli_num_rows($PCategoryImageResult2)>0){
    //     while($PCategoryImageRow2=mysqli_fetch_assoc($PCategoryImageResult2)){
    //         $PCategoryImage2=$PCategoryImageRow2['Product_Img'];
    //         unlink("./uploadImages/$PCategoryImage2");
    //     }
    // }
    $deleteSql2="delete from product where `P_Category_Id`=$dpcid";
    $deleteResult2=mysqli_query($conn,$deleteSql2);

    if($deleteResult and $deleteResult2){
        echo "<script>alert('Category Deleted Successfully')</script>";
    }else{
        echo "<script>alert('Category not Deleted')</script>";
    }
}

?>
<section class="PCategoryPage">
    <h2>Product Category</h2>
    <div class="crudBtn">
        <div class="add">
            <a href="addPCategoryForm.php">Add New</a>
        </div>
    </div>
    <div class="PCategoryContainer">
        <table>
            <thead>
                <tr>
                    <th>Product Category Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $nsql="select * from pro_category";
                $result=mysqli_query($conn,$nsql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['P_Category_Name'] ?></td>
                    <td><a href="updatePCategoryForm.php?pcid=<?php echo $row['P_Category_Id'] ?>">Edit</a><a href="PCategory.php?dpcid=<?php echo $row['P_Category_Id'] ?>">Delete</Button></a>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="5" style="text-align:center;font-size:20px">No Product Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>