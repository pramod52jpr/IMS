<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="buyProductPage">
    <div class="bpitems">
        <?php
        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];
            $sql = "select * from product where `P_Category_Id`=$cid";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="item">
                        <div class="item-img">
                            <img src="./uploadImages/<?php echo $row['Product_Img'] ?>" alt="product">
                            <div class="pname">
                                <?php echo $row['Product_Name'] ?>
                            </div>
                            <div class="pModal">Model No.
                                <?php echo $row['Product_Modal_No'] ?>
                            </div>
                        </div>
                        <div class="item-innerdiv">
                            <div class="pPrice" style="text-decoration:line-through;color:red;">Rs.
                                <?php echo $row['Normal_Price'] ?>
                            </div>
                            <div class="pPrice">Rs.
                                <?php echo $row['Discounted_Price'] ?>
                            </div>
                        </div>
                        <form class="buyProductAddForm" action="myOrders.php" method="post">
                            <input type="hidden" name="pid" value="<?php echo $row['Product_Id'] ?>">
                            <label for="piece">Quantity</label>
                            <input type="number" name="piece" id="piece" value="1" required>
                            <input class="btn" type="submit" value="Buy Now">
                        </form>
                    </div>
                    <?php
                }
            } else {
                ?>
                <h2 style="width:100%;text-align:center">No Products Available</h2>
                <?php
            }
        }
        ?>
    </div>
</section>

<?php include "./components/footer.php" ?>