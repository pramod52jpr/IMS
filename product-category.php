<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="productCategoryPage">
    <div class="categoryItems">
        <?php
        $sql="select * from pro_category";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
        ?>
                <a href="buyProduct.php?cid=<?php echo $row['P_Category_Id'] ?>" class="item">
                    <div class="image" style="background-image:url('./uploadImages/<?php echo $row['P_Category_Image'] ?>')">
                    </div>
                    <div><?php echo $row['P_Category_Name'] ?></div>
                </a>
        <?php
            }
        }
        ?>
    </div>
</section>
<?php include "./components/footer.php" ?>