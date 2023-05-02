<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<?php
$id=isset($_SESSION['Company_Id'])?$_SESSION['Company_Id']:1;
$btnSql="select * from orderstatus";
$btnResult=mysqli_query($conn,$btnSql);
if(isset($_GET['oid']) and isset($_GET['osid'])){
    $oid=$_GET['oid'];
    $osid=$_GET['osid'];

    $seriesOrderStatusSql="select `Order_Status` from orders where `Order_Id`=$oid";
    $seriesOrderStatusResult=mysqli_query($conn,$seriesOrderStatusSql);
    $seriesOrderStatusRow=mysqli_fetch_assoc($seriesOrderStatusResult);
    if(($osid!=$seriesOrderStatusRow['Order_Status']+1) and $osid!=5){
        echo "<script>alert('Please Follow the Steps One By One!')</script>";
    }else{
        if($osid==5){
            $canReason=",`Cancel_Reason`='This Item is currently out of Stock'";
        }else{
            $canReason="";
        }
        if($osid==3){
            $deliveryModeSql="select `Delievery_Mode` from orders where `Order_Id`=$oid";
            $deliveryModeResult=mysqli_query($conn,$deliveryModeSql);
            $deliveryModeRow=mysqli_fetch_assoc($deliveryModeResult);
            if($deliveryModeRow['Delievery_Mode']==0){
                echo "<script>alert('Please Choose any Delivery Mode!')</script>";
            }else{
                $osql="update orders set `Order_Status`=$osid".$canReason." where `Order_Id`=$oid";
                $oresult=mysqli_query($conn,$osql);
                if($oresult){
                    echo "<script>alert('Order Status Updated Successfully')</script>";
                }else{
                    echo "<script>alert('Order status not Updated')</script>";
                }
            }
        }elseif($osid==2){
            $priceSql="select `Approved` from orders where `Order_Id`=$oid";
            $priceResult=mysqli_query($conn,$priceSql);
            $priceRow=mysqli_fetch_assoc($priceResult);
            if($priceRow['Approved']==1){
                $osql="update orders set `Order_Status`=$osid".$canReason." where `Order_Id`=$oid";
                $oresult=mysqli_query($conn,$osql);
                if($oresult){
                    echo "<script>alert('Order Status Updated Successfully')</script>";
                }else{
                    echo "<script>alert('Order status not Updated')</script>";
                }
            }else{
                echo "<script>alert('Please Approve the Price')</script>";
            }
        }else{
            $osql="update orders set `Order_Status`=$osid".$canReason." where `Order_Id`=$oid";
            $oresult=mysqli_query($conn,$osql);
            if($oresult){
                echo "<script>alert('Order Status Updated Successfully')</script>";
            }else{
                echo "<script>alert('Order status not Updated')</script>";
            }
        }
        
    }
}
if(isset($_POST['orderId']) and isset($_POST['delivery'])){
    $orderId=$_POST['orderId'];
    $delivery=$_POST['delivery'];
    $deliveryUpdateSql="update orders set `Delievery_Mode`=$delivery where `Order_Id`=$orderId";
    $deliveryUpdateResult=mysqli_query($conn,$deliveryUpdateSql);
    if($deliveryUpdateResult){
        echo "<script>alert('Delivery Mode Updated')</script>";
    }else{
        echo "<script>alert('OOPS! Delivery Mode not Updated')</script>";
    }
}
if(isset($_POST['odrId']) and isset($_POST['docketNo'])){
    $odrId=$_POST['odrId'];
    $docketNo=$_POST['docketNo'];
    $docketUpdateSql="update orders set `Docket_No`='$docketNo' where `Order_Id`=$odrId";
    $docketUpdateResult=mysqli_query($conn,$docketUpdateSql);
    if($docketUpdateResult){
        echo "<script>alert('Docket No. Added')</script>";
    }else{
        echo "<script>alert('Docket No. not Added')</script>";
    }
}
if(isset($_POST['odrId']) and isset($_POST['approvedPrice'])){
    $odrId=$_POST['odrId'];
    $approvedPrice=$_POST['approvedPrice'];
    $updatePriceSql="update orders set `Approved_Price`=$approvedPrice,`Approved`=1 where `Order_Id`=$odrId";
    $updatePriceResult=mysqli_query($conn,$updatePriceSql);
    if($updatePriceResult){
        echo "<script>alert('Price Approved')</script>";
    }else{
        echo "<script>alert('Price not Approved')</script>";
    }
}
?>
<section class="allOrdersPage">
    <div class="filterBtnContainer">
        <!-- <div class="innerbtnbox"> -->
        
        <?php
        if(!isset($_GET['weekDate'])and !isset($_GET['monthDate'])){
            ?>
            <form class="orform" action="orders.php" method="get">
                From
                <input type="date" name="fromDate" id="" required>
                To
                <input type="date" name="toDate" id="" required>
                <input type="submit" value="Show Record">
            </form>
        <!-- </div> -->
        <!-- <div class="innerbtnbox"> -->
            <form class="orform2" action="orders.php" method="get">
                <select class="margin-top" name="comId">
                    <option value="" disabled selected>Select Company</option>
                    <?php
                    $comSearchSql="select `Company_Id`,`Company_Name` from company";
                    $comSearchResult=mysqli_query($conn,$comSearchSql);
                    if(mysqli_num_rows($comSearchResult)>0){
                        while($comSearchRow=mysqli_fetch_assoc($comSearchResult)){
                    ?>
                        <option value="<?php echo $comSearchRow['Company_Id'] ?>"><?php echo $comSearchRow['Company_Name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <input type="submit" value="Show">
            </form>
            <!-- </div> -->
            <div class="statusBtn">
                <?php
                $allSql="select `Order_Id` as count from orders";
                $allResult=mysqli_query($conn,$allSql);
                ?>
                <a href="orders.php">All (<?php echo mysqli_num_rows($allResult) ?>)</a>
                <?php
                if(mysqli_num_rows($btnResult)>0){
                    while($btnRow=mysqli_fetch_assoc($btnResult)){
                        $newSql="select * from orders where `Order_Status`=".$btnRow['Status_Id'];
                        $newResult=mysqli_query($conn,$newSql);
                ?>
                    <a href="orders.php?status=<?php echo $btnRow['Status_Id'] ?>"><?php echo $btnRow['Status_Name'] ?> (<?php echo mysqli_num_rows($newResult) ?>)</a>
                <?php
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="allOrdersContainer">
        <?php
        if(isset($_GET['fromDate']) and isset($_GET['toDate'])){
            $fromDate=$_GET['fromDate'];
            $toDate=$_GET['toDate'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` where `Order_Date` between '$fromDate' and '$toDate'";
            $fromDate=implode("/",array_reverse(explode("-",$_GET['fromDate'])));
            $toDate=implode("/",array_reverse(explode("-",$_GET['toDate'])));
            echo "<h3>From $fromDate To $toDate</h3>";
        }elseif(isset($_GET['status'])){
            $status=$_GET['status'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` where `Order_Status`=$status";

            $headSql="select * from orderstatus where `Status_Id`=$status";
            $headResult=mysqli_query($conn,$headSql);
            $headRow=mysqli_fetch_assoc($headResult);
            echo "<h3>".$headRow['Status_Name']." Orders</h3>";
        }elseif(isset($_GET['weekDate'])){
            $weekDate=$_GET['weekDate'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` where `Order_Date`>'$weekDate'";
            echo "<h3>Last Week Orders</h3>";
        }elseif(isset($_GET['monthDate'])){
            $monthDate=$_GET['monthDate'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` where `Order_Date`>'$monthDate'";
            echo "<h3>Last Month Orders</h3>";
        }elseif(isset($_GET['comId'])){
            $comId=$_GET['comId'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` where orders.`Company_Id`= '$comId'";

            $headSqlAgain="select `Company_Name` from company where `Company_Id`=$comId";
            $headResultAgain=mysqli_query($conn,$headSqlAgain);
            $headRowAgain=mysqli_fetch_assoc($headResultAgain);
            echo "<h3>".$headRowAgain['Company_Name']." Orders</h3>";
        }else{
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` order by `Order_Id` desc";
        }
        $aoresult=mysqli_query($conn,$aosql);
        if(mysqli_num_rows($aoresult)>0){
            while($aorow=mysqli_fetch_assoc($aoresult)){
        ?>
                <div class="order">
                    <div class="order-box">
                    <img src="./uploadImages/<?php echo $aorow['Product_Img'] ?>" alt="">
                    </div>
                    <div class="order-box">
                        <h2>Order Details</h2>
                        <div><span>Product : </span><span><?php echo $aorow['Product_Name'] ?></span></div>
                        <div><span>Quantity : </span><span><?php echo $aorow['Order_Pieces'] ?></span></div>
                    <?php
                    if($aorow['Approved']==1){
                    ?>
                        <div><span>Price Approved : </span><span><?php echo $aorow['Approved_Price'] ?></span></div>
                    <?php
                    }
                    ?>
                        <div><span>Modal No. : </span><span><?php echo $aorow['Product_Modal_No'] ?></span></div>
                        <div><span>Status : </span><span><?php echo $aorow['Status_Name'] ?></span></div>
                        <div><span>Date : </span><span><?php echo $aorow['Order_Date'] ?></span></div>
                    <?php
                    if($aorow['Order_Status']>=3 and $aorow['Order_Status']!=5){
                    ?>
                   
                        <div><span>Delivery Mode : </span><span><?php echo $aorow['Delivery_Type'] ?></span></div>
                    <?php
                    }
                    if($aorow['Order_Status']==5){
                    ?>
                        <div><span>Cancel Reason : </span><span><?php echo $aorow['Cancel_Reason'] ?></span></div>
                    <?php
                    }
                    ?>
                    </div>
                    <div class="order-box">
                        <h2>Company Details</h2>
                        <div><span>Company : </span><span><?php echo $aorow['Company_Name'] ?></span></div>
                        <div><span>Contact : </span><span><?php echo $aorow['Company_Phone'] ?></span></div>
                        <div><span>Email : </span><span><?php echo $aorow['Company_Email'] ?></span></div>
                        <div><span>Address : </span><span><?php echo $aorow['Company_Address'] ?></span></div>
                    </div>
                    <?php
                    if(!isset($_SESSION['User_Id'])){
                    ?>
                    <div class="order-box">
                        <h2>Price Approval : </h2>
                        <form action="orders.php" method="post">
                            <?php
                            if($aorow['Approved']==1 or $aorow['Order_Status']==5){
                                $disable="disabled";
                            }else{
                                $disable="";
                            }
                            ?>
                            <input type="hidden" name="odrId" value="<?php echo $aorow['Order_Id'] ?>">
                            <input type="text" name="approvedPrice" value="<?php echo $aorow['Approved_Price'] ?>" <?php echo $disable ?>>
                            <input type="submit" value="Approve" <?php echo $disable ?>>
                        </form>
                    </div>
                    <?php
                    }
                    ?>
                    <div class="order-box2">
                        <?php
                            $statusId=isset($status)?"status=$status&":"";
                            $dateId=isset($_GET['fromDate']) && isset($_GET['toDate'])?"fromDate=".$_GET['fromDate']."&toDate=".$_GET['toDate']."&":"";
                            $compId=isset($_GET['comId'])?"comId=".$_GET['comId']."&":"";
                        ?>
                        <form action="orders.php?<?php echo $compId ?><?php echo $dateId ?><?php echo $statusId ?>" method="post">
                            <?php
                            if($aorow['Delievery_Mode']>0 or $aorow['Order_Status']==5){
                                $disabledAgain="disabled";
                            }else{
                                $disabledAgain="";
                            }
                            ?>
                            <input type="hidden" name="orderId" value="<?php echo $aorow['Order_Id'] ?>">
                            <select class="select-b" name="delivery" <?php echo $disabledAgain ?>>
                                <option value="" selected disabled>Select Delivery Mode</option>
                                <?php
                                $delModeSql="select * from deliverymode";
                                $delModeResult=mysqli_query($conn,$delModeSql);
                                if(mysqli_num_rows($delModeResult)>0){
                                    while($delModeRow=mysqli_fetch_assoc($delModeResult)){
                                        if($aorow['Delievery_Mode']==$delModeRow['Delivery_Id']){
                                            $selected="selected";
                                        }else{
                                            $selected="";
                                        }
                                ?>
                                        <option value="<?php echo $delModeRow['Delivery_Id'] ?>" <?php echo $selected ?>><?php echo $delModeRow['Delivery_Type'] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <input class="sub-b" type="submit" value="save" <?php echo $disabledAgain ?>>
                        </form>
                        <form action="orders.php?<?php echo $compId ?><?php echo $dateId ?><?php echo $statusId ?>" method="post">
                            <?php
                            if($aorow['Docket_No']!==""){
                                $disables="disabled";
                            }else{
                                $disables="";
                            }
                            ?>
                            <input type="hidden" name="odrId" value="<?php echo $aorow['Order_Id'] ?>">
                            <input type="text" name="docketNo" value="<?php echo $aorow['Docket_No'] ?>" <?php echo $disables ?>>
                            <input type="submit" value="save" <?php echo $disables ?>>
                        </form>
                    <?php
                        $orderstatusSql="select * from orderstatus";
                        $orderstatusResult=mysqli_query($conn,$orderstatusSql);
                        if(mysqli_num_rows($orderstatusResult)>0){
                            while($orderstatusRow=mysqli_fetch_assoc($orderstatusResult)){
                                if($aorow['Order_Status']>=$orderstatusRow['Status_Id']){
                                    $disabled="style='background-color:grey;pointer-events:none'";
                                }else{
                                    $disabled="";
                                }
                                if(($aorow['Order_Status']==5) and ($orderstatusRow['Status_Id']!=5)){
                                    continue;
                                }
                                if(isset($_SESSION['User_Id'])){
                                    if($orderstatusRow['Status_Id']<=2){
                                        continue;
                                    }
                                }
                    ?>
                        <a class="order-button" href="orders.php?<?php echo $compId ?><?php echo $dateId ?><?php echo $statusId ?>oid=<?php echo $aorow['Order_Id'] ?>&osid=<?php echo $orderstatusRow['Status_Id'] ?>" <?php echo $disabled ?>><?php echo $orderstatusRow['Status_Name'] ?></a>
                    <?php
                        if((($aorow['Order_Status']==$orderstatusRow['Status_Id'])) and ($aorow['Order_Status']>=mysqli_num_rows($orderstatusResult)-1)){
                            break;
                        }
                            }
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
    </div>
</section>
<?php include "./components/footer.php" ?>