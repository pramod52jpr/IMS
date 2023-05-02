<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="buyProductPage">
    <div class="bpitems">
        <?php
        if(isset($_GET['cid'])){
            $cid=$_GET['cid'];
            $sql="select * from product where `P_Category_Id`=$cid";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                while($row=mysqli_fetch_assoc($result)){
            ?>
                <div class="item">
                    <img src="./uploadImages/<?php echo $row['Product_Img'] ?>" alt="product">
                    <div class="pname"><?php echo $row['Product_Name'] ?></div>
                    <div class="pModal"><?php echo $row['Product_Modal_No'] ?></div>
                    <div class="pPrice" style="text-decoration:line-through">Rs. <?php echo $row['Normal_Price'] ?></div>
                    <div class="pPrice">Rs. <?php echo $row['Discounted_Price'] ?></div>
                    <a href="buyProductForm.php?cid=<?php echo $cid ?>&pid=<?php echo $row['Product_Id'] ?>">Buy Now</a>
                </div>
            <?php
                }
            }else{
        ?>
        <h2 style="width:100%;text-align:center">No Products Available</h2>
        <?php
            }
        }
        ?>
    </div>
</section>

<?php include "./components/footer.php" ?>