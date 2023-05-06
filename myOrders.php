<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="myOrdersPage">
    <div class="myOrdersContainer">
        <?php
        $id=isset($_SESSION['Company_Id'])?$_SESSION['Company_Id']:1;
        $cancelReasonSql="select * from orderstatus";
        $cancelReasonResult=mysqli_query($conn,$cancelReasonSql);
        if(isset($_POST['pid']) and isset($_POST['piece'])){
            $pid=$_POST['pid'];
            $piece=$_POST['piece'];
            $salePrice=$_POST['salePrice'];

            $orderPriceSql="select `Discounted_Price` from product where `Product_Id`=$pid";
            $orderPriceResult=mysqli_query($conn,$orderPriceSql);
            $orderPriceRow=mysqli_fetch_assoc($orderPriceResult);
            $orderPrice=$orderPriceRow['Discounted_Price'];
            $orderDate=date("Y-m-d");

            $sql="insert into orders(`Sale_Price`,`Approved_Price`,`Order_Pieces`,`Order_Status`,`Product_Id`,`Company_Id`,`Order_Date`) values($salePrice,$orderPrice,$piece,1,$pid,$id,'$orderDate')";
            $result=mysqli_query($conn,$sql);
            if($result){
                echo "<script>alert('Order Placed Successfully')</script>";
            }else{
                echo "<script>alert('Order not Placed! Please try again')</script>";
            }
        }
        if(isset($_POST['canoid'])){
            $canoid=$_POST['canoid'];
            $cancelReason=$_POST['cancelReason'];
            $cansql="update orders set `Order_Status`=". mysqli_num_rows($cancelReasonResult) .",`Cancel_Reason`='$cancelReason' where `Order_Id`=$canoid";
            $canresult=mysqli_query($conn,$cansql);
            if($canresult){
                echo "<script>alert('Order Cancelled Successfully')</script>";
            }else{
                echo "<script>alert('Order not Cancelled')</script>";
            }
        }
        if(isset($_GET['twoDaysDate'])){
            $twoDaysDate=$_GET['twoDaysDate'];
            $osql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` where orders.`Company_Id`=$id and Orders.`Order_Date`>'$twoDaysDate' order by `Order_Id` desc";
        }elseif(isset($_GET['weekDate'])){
            $weekDate=$_GET['weekDate'];
            $osql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` where orders.`Company_Id`=$id and Orders.`Order_Date`>'$weekDate' order by `Order_Id` desc";
        }elseif(isset($_GET['monthDate'])){
            $monthDate=$_GET['monthDate'];
            $osql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` where orders.`Company_Id`=$id and Orders.`Order_Date`>'$monthDate' order by `Order_Id` desc";
        }elseif(isset($_GET['status'])){
            $status=$_GET['status'];
            $osql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` where orders.`Company_Id`=$id and Orders.`Order_Status`=$status order by `Order_Id` desc";
        }else{
            $osql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` where orders.`Company_Id`=$id order by `Order_Id` desc";
        }
        $oresult=mysqli_query($conn,$osql);
        if(mysqli_num_rows($oresult)>0){
            while($orow=mysqli_fetch_assoc($oresult)){
        ?>
            <div class="Morder">
                <div class="myorder-box image" style="background-image:url('./uploadImages/<?php echo $orow['Product_Img'] ?>')">
                </div>
                <div class="myorder-box">
                    <h2>Order Details</h2>
                        <div><span>Product : </span><span><?php echo $orow['Product_Name'] ?></span></div>
                        <div><span>Quantity : </span><span><?php echo $orow['Order_Pieces'] ?></span></div>
                    <?php
                        if($orow['Delivery_Date']!=""){
                    ?>
                        <div><span>Delivery Date : </span><span><?php echo $orow['Delivery_Date'] ?></span></div>
                    <?php
                    }
                    ?>
                        <div><span>Order Date : </span><span><?php echo $orow['Order_Date'] ?></span></div>
                        <div><span>Normal Price : </span><span><?php echo $orow['Normal_Price'] ?></span></div>
                        <div><span>Discounted Price : </span><span><?php echo $orow['Discounted_Price'] ?></span></div>
                    <?php
                    if($orow['Approved']==1){
                    ?>
                        <div><span>Price Approved : </span><span><?php echo $orow['Approved_Price'] ?></span></div>
                    <?php
                    }
                    ?>
                        <div><span>Modal No. : </span><span><?php echo $orow['Product_Modal_No'] ?></span></div>
                        <div><span>Status : </span><span><?php echo $orow['Status_Name'] ?></span></div>
                        <div><span>Date : </span><span><?php echo $orow['Order_Date'] ?></span></div>
                    <?php
                    if($orow['Order_Status']==mysqli_num_rows($cancelReasonResult)){
                    ?>
                        <div><span>Cancel Reason : </span><span><?php echo $orow['Cancel_Reason'] ?></span></div>
                    <?php
                    }
                    ?>
                    </div>
                    <div class="myorder-boxbtn">
                    <?php
                    if($orow['Order_Status']<4){
                    ?>
                        <a href="cancelReason.php?canoid=<?php echo $orow['Order_Id'] ?>">Cancel Order</a>
                    <?php
                    }
                    ?>
                        </div>
                </div>
        <?php
            }
        }else{
        ?>
        <h2 align="center">No Orders Yet</h2>
        <?php
        }
        ?>
    </div>
</section>
<?php include "./components/footer.php" ?>