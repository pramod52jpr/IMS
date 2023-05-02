<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<section class="dashboardPage">
<?php
if(isset($_SESSION['Company_Id'])){
    $companyId=$_SESSION['Company_Id'];
    $adminSql="select `Admin_Type` from company where `Company_Id`=$companyId";
}elseif(isset($_SESSION['User_Id'])){
    $userId=$_SESSION['User_Id'];
    $adminSql="select `Admin_Type` from users where `User_Id`=$userId";
}
$adminResult=mysqli_query($conn,$adminSql);
$adminRow=mysqli_fetch_assoc($adminResult);
if($adminRow['Admin_Type']==1){
// last week sql code
    $todayDate=date("Y-m-d");
    if((intval(date("d"))-7)<1){
        $Lastweek=30+(intval(date("d"))-7);
        $lastWeekMonth=intval(date("m"))-1;
        if($lastWeekMonth<1){
            $lastWeekMonth=12+$lastWeekMonth;
            $lastWeekYear=intval(date("Y"))-1;
        }else{
            $lastWeekYear=intval(date("Y"));
        }
    }else{
        $Lastweek=intval(date("d"))-7;
        $lastWeekMonth=intval(date("m"));
        $lastWeekYear=intval(date("Y"));
    }
    $lastweekDate=date("$lastWeekYear-$lastWeekMonth-$Lastweek");
    $last2DaysOrderSql="select * from orders where `Order_Date`>'$lastweekDate'";
    $lastWeekOrderResult=mysqli_query($conn,$last2DaysOrderSql);
// last month sql code
    if((intval(date("m"))-1)<1){
        $LastMonth=12+(intval(date("m"))-1);
        $LastMonthYear=intval(date("Y"))-1;
    }else{
        $LastMonth=intval(date("m"))-1;
        $LastMonthYear=intval(date("Y"));
    }
    $lastMonthDate=date("$LastMonthYear-$LastMonth-d");
    $lastMonthOrderSql="select * from orders where `Order_Date`>'$lastMonthDate'";
    $lastMonthOrderResult=mysqli_query($conn,$lastMonthOrderSql);
// all Orders sql code
    $allOrderSql="select * from orders";
    $allOrderResult=mysqli_query($conn,$allOrderSql);
// all Conpanies sql code
    $allCompanySql="select * from company";
    $allCompanyResult=mysqli_query($conn,$allCompanySql);

?>
    <div class="adminSection">
        <div class="items">
            <div class="inner-item1">
                <h3>Last Week Orders</h3>
                <h2><?php echo mysqli_num_rows($lastWeekOrderResult) ?></h2>
                <p>Order Recieved</p>
            </div>
            <div class="inner-item2">
                <a href="orders.php?weekDate=<?php echo $lastweekDate ?>">
                <span class="title">View Order</span>
                <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
        <div class="items">
            <div class="inner-item1">
                <h3>Last Month Orders</h3>
                <h2><?php echo mysqli_num_rows($lastMonthOrderResult) ?></h2>
                <p>Order Recieved</p>
            </div>
            <div class="inner-item2">
                <a href="orders.php?monthDate=<?php echo $lastMonthDate ?>">
                <span class="title">View Order</span>
                <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
        <div class="items">
            <div class="inner-item1">
                <h3>All Orders</h3>
                <h2><?php echo mysqli_num_rows($allOrderResult) ?></h2>
                <p>Order Recieved</p>
            </div>
            <div class="inner-item2">
                <a href="orders.php">
                <span class="title">View Order</span>
                <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
        <div class="items">
            <div class="inner-item1">
                <h3>Companies</h3>
                <h2><?php echo mysqli_num_rows($allCompanyResult) ?></h2>
                <p>Company Registered</p>
            </div>
            <div class="inner-item2">
                <a href="company.php">
                <span class="company">View Company</span>
                <i class="fa-solid fa-building"></i></a>
                </div>
            </div>
        </div>
    </div>
    <h1>Today Orders</h1>
    <div class="todayOrdersContainer">
        <?php
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
        $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` where `Order_Date`='$todayDate' order by orders.`Order_Id` asc";
        $aoresult=mysqli_query($conn,$aosql);
        if(mysqli_num_rows($aoresult)>0){
            while($aorow=mysqli_fetch_assoc($aoresult)){
        ?>
                <div class="order">
                    <img src="./uploadImages/<?php echo $aorow['Product_Img'] ?>" alt="">
                    <div class="about">
                        <h2>Order Details : </h2>
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
                    <div class="about">
                        <h2>Company Details : </h2>
                        <div><span>Company : </span><span><?php echo $aorow['Company_Name'] ?></span></div>
                        <div><span>Contact : </span><span><?php echo $aorow['Company_Phone'] ?></span></div>
                        <div><span>Email : </span><span><?php echo $aorow['Company_Email'] ?></span></div>
                        <div><span>Address : </span><span><?php echo $aorow['Company_Address'] ?></span></div>
                    </div>
                    <?php
                    if(!isset($_SESSION['User_Id'])){
                    ?>
                    <div class="about">
                        <h2>Price Approval : </h2>
                        <form action="dashboard.php" method="post">
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
                    <div class="about">
                        <form action="dashboard.php" method="post">
                            <?php
                            if($aorow['Delievery_Mode']>0 or $aorow['Order_Status']==5){
                                $disabledAgain="disabled";
                            }else{
                                $disabledAgain="";
                            }
                            ?>
                            <input type="hidden" name="orderId" value="<?php echo $aorow['Order_Id'] ?>">
                            <select name="delivery" <?php echo $disabledAgain ?>>
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
                            <input type="submit" value="save" <?php echo $disabledAgain ?>>
                        </form>
                        <form action="dashboard.php" method="post">
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
                                <a href="dashboard.php?oid=<?php echo $aorow['Order_Id'] ?>&osid=<?php echo $orderstatusRow['Status_Id'] ?>" <?php echo $disabled ?>><?php echo $orderstatusRow['Status_Name'] ?></a>
                        <?php
                                if((($aorow['Order_Status']==$orderstatusRow['Status_Id'])) and ($aorow['Order_Status']>=4)){
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
        <h2 align="center">No Orders Today</h2>
        <?php
        }
        ?>
    </div>
    <?php 
    }elseif($adminRow['Admin_Type']==2){
    // last 2 days sql code
        $todayDate=date("Y-m-d");
        if((intval(date("d"))-2)<1){
            $Last2Days=30+(intval(date("d"))-2);
            $last2DaysMonth=intval(date("m"))-1;
            if($last2DaysMonth<1){
                $last2DaysMonth=12+$last2DaysMonth;
                $last2DaysYear=intval(date("Y"))-1;
            }else{
                $last2DaysYear=intval(date("Y"));
            }
        }else{
            $Last2Days=intval(date("d"))-2;
            $last2DaysMonth=intval(date("m"));
            $last2DaysYear=intval(date("Y"));
        }
        $last2DaysDate=date("$last2DaysYear-$last2DaysMonth-$Last2Days");
        $last2DaysOrderSql="select * from orders where `Company_Id`=$companyId and `Order_Date`>'$last2DaysDate'";
        $last2DaysOrderResult=mysqli_query($conn,$last2DaysOrderSql);
    // last One week sql code
        if((intval(date("d"))-7)<1){
            $LastWeekDays=30+(intval(date("d"))-7);
            $lastWeekDaysMonth=intval(date("m"))-1;
            if($lastWeekDaysMonth<1){
                $lastWeekDaysMonth=12+$lastWeekDaysMonth;
                $lastWeekDaysYear=intval(date("Y"))-1;
            }else{
                $lastWeekDaysYear=intval(date("Y"));
            }
        }else{
            $LastWeekDays=intval(date("d"))-7;
            $lastWeekDaysMonth=intval(date("m"));
            $lastWeekDaysYear=intval(date("Y"));
        }
        $lastWeekDaysDate=date("$lastWeekDaysYear-$lastWeekDaysMonth-$LastWeekDays");
        $lastWeekDaysOrderSql="select * from orders where `Company_Id`=$companyId and `Order_Date`>'$lastWeekDaysDate'";
        $lastWeekDaysOrderResult=mysqli_query($conn,$lastWeekDaysOrderSql);
    // Last One Month sql code
        if((intval(date("m"))-1)<1){
            $LastMonth=12+(intval(date("m"))-1);
            $LastMonthYear=intval(date("Y"))-1;
        }else{
            $LastMonth=intval(date("m"))-1;
            $LastMonthYear=intval(date("Y"));
        }
        $lastMonthDate=date("$LastMonthYear-$LastMonth-d");
        $lastMonthOrderSql="select * from orders where `Company_Id`=$companyId and `Order_Date`>'$lastMonthDate'";
        $lastMonthOrderResult=mysqli_query($conn,$lastMonthOrderSql);
    // Recieved Orders sql code
        $recievedSql="select * from orders where `Company_Id`=$companyId and `Order_Status`=4";
        $recievedResult=mysqli_query($conn,$recievedSql);
    ?>
        <div class="adminSection">
        <div class="items">
            <h3>Last 2 Days Orders</h3>
            <h2><?php echo mysqli_num_rows($last2DaysOrderResult) ?></h2>
            <p>Items Ordered</p>
            <a href="myOrders.php?twoDaysDate=<?php echo $last2DaysDate ?>">View Orders</a>
        </div>
        <div class="items">
            <h3>Last Week Orders</h3>
            <h2><?php echo mysqli_num_rows($lastWeekDaysOrderResult) ?></h2>
            <p>Items Ordered</p>
            <a href="myOrders.php?weekDate=<?php echo $lastWeekDaysDate ?>">View Orders</a>
        </div>
        <div class="items">
            <h3>Last Month Orders</h3>
            <h2><?php echo mysqli_num_rows($lastMonthOrderResult) ?></h2>
            <p>Items Ordered</p>
            <a href="myOrders.php?monthDate=<?php echo $lastMonthDate ?>">View Orders</a>
        </div>
        <div class="items">
            <h3>Order Recieved</h3>
            <h2><?php echo mysqli_num_rows($recievedResult) ?></h2>
            <p>Items Recieved</p>
            <a href="myOrders.php?status=4">View Orders</a>
        </div>
    </div>
    <h1>Today Orders</h1>
    <div class="todayOrdersContainer">
        <?php
        if(isset($_GET['canoid'])){
            $canoid=$_GET['canoid'];
            $canoidSql="update orders set `Order_Status`=5 where `Order_Id`=$canoid";
            $canoidResult=mysqli_query($conn,$canoidSql);
            if($canoidResult){
                echo "<script>alert('Order Cancelled Successfully')</script>";
            }else{
                echo "<script>alert('Order not Cancelled')</script>";
            }
        }
        $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` where orders.`Company_Id`=$companyId and `Order_Date`='$todayDate' order by orders.`Order_Id` asc";
        $aoresult=mysqli_query($conn,$aosql);
        if(mysqli_num_rows($aoresult)>0){
            while($aorow=mysqli_fetch_assoc($aoresult)){
        ?>
                <div class="order">
                    <img src="./uploadImages/<?php echo $aorow['Product_Img'] ?>" alt="">
                    <div class="distributerAbout">
                        <h2>Order Details : </h2>
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
                    if($aorow['Order_Status']==5){
                    ?>
                        <div><span>Cancel Reason : </span><span><?php echo $aorow['Cancel_Reason'] ?></span></div>
                    <?php
                    }
                    ?>
                    </div>
                    <?php
                    if($aorow['Order_Status']<4){
                    ?>
                        <a href="cancelReason.php?canoid=<?php echo $aorow['Order_Id'] ?>">Cancel</a>
                    <?php
                    }
                    ?>
                </div>
        <?php
            }
        }else{
        ?>
        <h2 align="center">No Orders Today</h2>
        <?php
        }
        ?>
    <?php } ?>
</section>
<?php include "./components/footer.php" ?>