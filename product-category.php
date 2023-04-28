<?php include "conn.php" ?>
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
                    <img src="./uploadImages/<?php echo $row['P_Category_Image'] ?>" alt="">
                    <div><?php echo $row['P_Category_Name'] ?></div>
                </a>
        <?php
            }
        }
        ?>
    </div>
</section>
<?php include "./components/footer.php" ?>