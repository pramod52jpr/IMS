<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="myOrdersPage">
    <div class="myOrdersContainer">
        <?php
        $id=$_SESSION['Company_Id'];
        $cancelReasonSql="select * from orderstatus";
        $cancelReasonResult=mysqli_query($conn,$cancelReasonSql);
        if(isset($_POST['pid']) and isset($_POST['name'])){
            $pid=$_POST['pid'];
            $name=$_POST['name'];
            $contact=$_POST['contact'];
            $email=$_POST['email'];
            $address=$_POST['address'];
            $piece=$_POST['piece'];

            $sql="insert into orders(`Person_Name`,`Person_Phone`,`Person_Email`,`Order_Address`,`Order_Pieces`,`Order_Status`,`Product_Id`,`Company_Id`) values('$name','$contact','$email','$address',$piece,1,$pid,$id)";
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
                <div class="myOrder">
                    <img src="./uploadImages/<?php echo $orow['Product_Img'] ?>" alt="">
                    <div class="about">
                        <div><span>Product : </span><span><?php echo $orow['Product_Name'] ?></span></div>
                        <div><span>Quantity : </span><span><?php echo $orow['Order_Pieces'] ?></span></div>
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
                    <?php
                    if($orow['Order_Status']!=mysqli_num_rows($cancelReasonResult)){
                    ?>
                        <a href="cancelReason.php?canoid=<?php echo $orow['Order_Id'] ?>">Cancel Order</a>
                    <?php
                    }
                    ?>
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