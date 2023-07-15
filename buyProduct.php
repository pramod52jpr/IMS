<?php include "conn.php" ?>
<?php
session_start();
if (!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])) {
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="buyProductPage">
    <div class="search">
        <form action="" method="post">
            <input type="text" name="search" placeholder="search item" value="<?php echo isset($_POST['search'])?$_POST['search']:"" ?>">
            <input type="submit" value="Search">
        </form>
    </div>
    <div class="bpitems">
        <?php
        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];
            if(isset($_POST['search'])){
                $search=$_POST['search'];
                $sql = "select * from product where `P_Category_Id`=$cid and (`Product_Name` like '%$search%' or `Product_Modal_No` like '%$search%')";
            }else{
                $sql = "select * from product where `P_Category_Id`=$cid";
            }
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
                        <?php
                        if ($row['Quantity'] > 0) {
                            ?>
                            <form class="buyProductAddForm" action="myOrders.php" method="post">
                                <div class="form-p">
                                    <input type="hidden" name="pid" value="<?php echo $row['Product_Id'] ?>">
                                    <div class="formi-p">
                                        <label for="salePrice">Sale Rs. <span style="color:red">*</span></label>
                                        <input type="number" name="salePrice" id="salePrice" placeholder="Enter Sale Rs." required>
                                    </div>
                                    <div class="formi-p">
                                        <label for="shippingMode">Shipping Mode</label>
                                        <select name="shippingMode" id="shippingMode">
                                            <option value="" selected disabled>(Optional)</option>
                                            <?php
                                            $shippingModeSql="select * from deliverymode";
                                            $shippingModeResult=mysqli_query($conn,$shippingModeSql);
                                            if(mysqli_num_rows($shippingModeResult)>0){
                                                while($shippingModeRow=mysqli_fetch_assoc($shippingModeResult)){
                                                    if($aorow['Delievery_Mode']==$shippingModeRow['Delivery_Id']){
                                                        $selected="selected";
                                                    }else{
                                                        $selected="";
                                                    }
                                            ?>
                                                    <option value="<?php echo $shippingModeRow['Delivery_Id'] ?>" <?php echo $selected ?>><?php echo $shippingModeRow['Delivery_Type'] ?></option>
                                            <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="formi-p">
                                        <label for="piece">Quantity <span style="color:red">*</span></label>
                                        <input type="number" name="piece" id="piece" value="1" min="1"
                                            max="<?php echo $row['Quantity'] ?>" required>
                                    </div>
                                    <div class="formi-p">
                                        <input class="btn" type="submit" value="Buy Now">
                                    </div>
                                </div>
                            </form>
                            <?php
                        } else {
                            echo "<h5 style='color:red'>This Item is Currently Out of Stock</h5>";
                        }
                        ?>

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