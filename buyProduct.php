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
                            <div class="image" style="background-image:url('./uploadImages/<?php echo $row['Product_Img'] ?>')">
                            </div>
                            <div class="pname">
                                <?php echo $row['Product_Name'] ?>
                            </div>
                            <div class="pModal">Model No.
                                <?php echo $row['Product_Modal_No'] ?>
                            </div>
                        </div>
                        <div class="item-innerdiv">
                            <div class="pPrice" style="text-decoration:line-through;color:tan;">MRP.
                                <?php echo $row['Normal_Price'] ?>
                            </div>
                            <div class="pPrice">MRP.
                                <?php echo $row['Discounted_Price'] ?>
                            </div>
                        </div>
                       
                        <form class="buyProductAddForm" action="myOrders.php" method="post">
                            <div class="form-p">
                            <input type="hidden" name="pid" value="<?php echo $row['Product_Id'] ?>">
                            <div class="formi-p">
                            <label for="salePrice">Sale Rs.</label>
                          <input type="number" name="salePrice" id="salePrice" placeholder="Enter Sale Rs." required>
                          </div>
                          <div class="formi-p">
                            <label for="piece">Quantity</label>
                            <input type="number" name="piece" id="piece" value="1" required>
                          </div>
                            <div class="formi-p">
                            <input class="btn" type="submit" value="Buy Now">
                            </div>
                            </div>
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