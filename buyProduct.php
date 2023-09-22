<?php include "conn.php" ?>
<?php
session_start();
$id=isset($_SESSION['Company_Id'])?$_SESSION['Company_Id']:1;
if (!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])) {
    Header("Location: $lDomain");
}
session_abort();

// if user order their distributer orders

if(isset($_GET['comp-id'])){
    $id=$_GET['comp-id'];
}
if(isset($_GET['comp-id'])){
    $comId=$_GET['comp-id'];
    $comp_id="&comp-id=$comId";
}else{
    $comp_id="";
}

// if user order their distributer orders  ------> end

if(isset($_POST['pid']) and isset($_POST['piece'])){
    $pid=$_POST['pid'];
    $piece=$_POST['piece'];
    $salePrice=$_POST['salePrice'];
    $shippingMode=isset($_POST['shippingMode'])?$_POST['shippingMode']:0;

    $sql="insert into mycart(`pro_id`,`sale_prize`,`quantity`,`delivery_mode`,`comp_id`) values($pid,$salePrice,$piece,$shippingMode,$id)";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Added to Cart Successfully')</script>";
    }else{
        echo "<script>alert('Addition to cart Failed')</script>";
    }
}
?>
<?php include "./components/header.php" ?>
<section class="buyProductPage">
    <button class="backToTopBtn"><i class="fa-solid fa-arrow-up"></i></button>
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
                        <form class="buyProductAddForm" action="buyProduct.php?cid=<?php echo $cid.$comp_id ?>" method="post">
                            <div class="form-p">
                                <input type="hidden" name="pid" value="<?php echo $row['Product_Id'] ?>">
                                <div class="formi-p">
                                    <label for="salePrice">Sale Rs. <span style="color:red">*</span></label>
                                    <input type="text" name="salePrice" id="salePrice" placeholder="Enter Sale Rs." required>
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
                                    <input type="number" name="piece" id="piece" placeholder="Quantity" min="1" required>
                                </div>
                                <div class="formi-p">
                                    <input class="btn" type="submit" value="Add to Cart">
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