<?php include "conn.php" ?>
<?php
session_start();
$id=isset($_SESSION['Company_Id'])?$_SESSION['Company_Id']:1;
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<?php
if(isset($_GET['oid']) and isset($_GET['osid'])){
    $oid=$_GET['oid'];
    $osid=$_GET['osid'];
    $productId=$_GET['productId'];

    $seriesOrderStatusSql="select `Return_Status`,`Return_Pieces` from orders where `Order_Id`=$oid";
    $seriesOrderStatusResult=mysqli_query($conn,$seriesOrderStatusSql);
    $seriesOrderStatusRow=mysqli_fetch_assoc($seriesOrderStatusResult);

    $returnPieces=$seriesOrderStatusRow['Return_Pieces'];

    if(($osid!=$seriesOrderStatusRow['Return_Status']+1)){
        echo "<script>alert('Please Follow the Steps One By One!')</script>";
    }else{
        if($osid==2){
            $osql="update orders set `Return_Approvel`=1,`Return_Status`=$osid where `Order_Id`=$oid";
            $oresult=mysqli_query($conn,$osql);
            if($oresult){
                echo "<script>alert('Return Status Updated Successfully')</script>";
            }else{
                echo "<script>alert('Return status not Updated')</script>";
            }
        }else{
            $returnSql="select `Return_Date` from orders where `Order_Id`=$oid";
            $returnResult=mysqli_query($conn,$returnSql);
            $returnRow=mysqli_fetch_assoc($returnResult);

            $returnStockDate=$returnRow['Return_Date'];

            if($returnStockDate==""){
                echo "<script>alert('Please Fill the Return Date First')</script>";
            }else{
                $osql="update orders set `Return_Status`=$osid where `Order_Id`=$oid";
                $oresult=mysqli_query($conn,$osql);

                $returnStockSql="insert into returnstock(`Stock_Quantity`,`Product_Id`,`Return_Date`) values($returnPieces,$productId,'$returnStockDate')";
                $returnStockResult=mysqli_query($conn,$returnStockSql);
                if($oresult and $returnStockResult){
                    echo "<script>alert('Return Status Updated Successfully')</script>";
                }else{
                    echo "<script>alert('Return status not Updated')</script>";
                }
            }
        }
    }
}
if(isset($_POST['oderId']) and isset($_POST['returnDate'])){
    $returnStatus=$_POST['returnStatus'];
    $oderId=$_POST['oderId'];
    $returnDate=$_POST['returnDate'];
    if($returnDate==""){
        echo "<script>alert('Please Enter Return Date')</script>";
    }elseif($returnStatus<2){
        echo "<script>alert('Stay for Return Approved')</script>";
    }else{
        $returnDateSql="update orders set `Return_Date`='$returnDate' where `Order_Id`=$oderId";
        $returnDateResult=mysqli_query($conn,$returnDateSql);
        if($returnDateResult){
            echo "<script>alert('Return Date Added')</script>";
        }else{
            echo "<script>alert('Return Date not Added')</script>";
        }
    }
}
if(isset($_GET['returnOrderApproveId'])){
    $returnOrderApproveId=$_GET['returnOrderApproveId'];
    $returnOrderApproveSql="update orders set `Return_Approvel`=1,`Return_Status`=2 where `Order_Id`=$returnOrderApproveId";
    $returnOrderApproveResult=mysqli_query($conn,$returnOrderApproveSql);
    if($returnOrderApproveResult){
        echo "<script>alert('Return Approved')</script>";
    }else{
        echo "<script>alert('Return not Approved')</script>";
    }
}
?>
<section class="allOrdersPage">
    <div class="filterBtnContainer">
        <!-- <div class="innerbtnbox"> -->
        
        <?php
        if(!isset($_GET['weekDate'])and !isset($_GET['monthDate'])){
            ?>
            <form class="orform" action="returnOrders.php" method="get">
                From
                <input type="date" name="fromDate" id="" required>
                To
                <input type="date" name="toDate" id="" required>
                <input type="submit" value="Show Record">
            </form>
        <!-- </div> -->
        <!-- <div class="innerbtnbox"> -->
            <form class="orform2" action="returnOrders.php" method="get">
                <select class="margin-top" name="comId" required>
                    <option value="" disabled selected>Select Company</option>
                    <?php
                    $comSearchSql="select `Company_Id`,`Company_Name` from company";
                    $comSearchResult=mysqli_query($conn,$comSearchSql);
                    if(mysqli_num_rows($comSearchResult)>0){
                        while($comSearchRow=mysqli_fetch_assoc($comSearchResult)){
                            if(isset($_GET['comId']) and ($_GET['comId']==$comSearchRow['Company_Id'])){
                                $select="selected";
                            }else{
                                $select="";
                            }
                    ?>
                        <option value="<?php echo $comSearchRow['Company_Id'] ?>" <?php echo $select ?>><?php echo $comSearchRow['Company_Name'] ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
                <select name="proId">
                    <option value="" disabled selected>Select Product</option>
                    <?php
                    $proSearchSql="select `Product_Id`,`Product_Modal_No` from product";
                    $proSearchResult=mysqli_query($conn,$proSearchSql);
                    if(mysqli_num_rows($proSearchResult)>0){
                        while($proSearchRow=mysqli_fetch_assoc($proSearchResult)){
                            if(isset($_GET['proId']) and $_GET['proId']==$proSearchRow['Product_Id']){
                                $selects="selected";
                            }else{
                                $selects="";
                            }
                    ?>
                        <option value="<?php echo $proSearchRow['Product_Id'] ?>" <?php echo $selects ?>><?php echo $proSearchRow['Product_Modal_No'] ?></option>
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
                $allSql="select `Order_Id` as count from orders where `Return_Status`>0";
                $allResult=mysqli_query($conn,$allSql);
                ?>
                <a href="returnOrders.php">All (<?php echo mysqli_num_rows($allResult) ?>)</a>
                <?php
                $btnSql="select * from returnmode";
                $btnResult=mysqli_query($conn,$btnSql);
                if(mysqli_num_rows($btnResult)>0){
                    while($btnRow=mysqli_fetch_assoc($btnResult)){
                        $newSql="select * from orders where `Return_Status`=".$btnRow['Returnmode_Id'];
                        $newResult=mysqli_query($conn,$newSql);
                        if($btnRow['Returnmode_Id']==0){
                            continue;
                        }
                ?>
                    <a href="returnOrders.php?status=<?php echo $btnRow['Returnmode_Id'] ?>"><?php echo $btnRow['Return_Mode'] ?> (<?php echo mysqli_num_rows($newResult) ?>)</a>
                <?php
                    }
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="heading">
        <a href="exportData.php?export=returnOrders" style="margin-left:4%;margin-top:30px">Export</a>
    </div>
    <div class="allOrdersContainer">
        <?php
        if(isset($_GET['fromDate']) and isset($_GET['toDate'])){
            $fromDate=$_GET['fromDate'];
            $toDate=$_GET['toDate'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where (`Return_Date` between '$fromDate' and '$toDate') and orders.`Return_Status`>0";
            $fromDate=implode("/",array_reverse(explode("-",$_GET['fromDate'])));
            $toDate=implode("/",array_reverse(explode("-",$_GET['toDate'])));
            echo "<h3>From $fromDate To $toDate</h3>";
        }elseif(isset($_GET['status'])){
            $status=$_GET['status'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where orders.`Order_Status`=4 and orders.`Return_Status`=$status";

            $headSql="select * from returnmode where `Returnmode_Id`=$status";
            $headResult=mysqli_query($conn,$headSql);
            $headRow=mysqli_fetch_assoc($headResult);
            echo "<h3>".$headRow['Return_Mode']." Orders</h3>";
        }elseif(isset($_GET['comId']) and isset($_GET['proId'])){
            $comId=$_GET['comId'];
            $proId=$_GET['proId'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where orders.`Company_Id`=$comId and orders.`Product_Id`=$proId and orders.`Return_Status`>0";

            $modalSql="select `Product_Modal_No` from product where `Product_Id`=$proId";
            $modalResult=mysqli_query($conn,$modalSql);
            $modalRow=mysqli_fetch_assoc($modalResult);

            $headSqlAgain="select `Company_Name` from company where `Company_Id`=$comId";
            $headResultAgain=mysqli_query($conn,$headSqlAgain);
            $headRowAgain=mysqli_fetch_assoc($headResultAgain);
            echo "<h3>".$headRowAgain['Company_Name']." Orders</h3>";
            echo "<h3>Modal No. : ".$modalRow['Product_Modal_No']."</h3>";
        }elseif(isset($_GET['comId'])){
            $comId=$_GET['comId'];
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where orders.`Company_Id`= $comId and orders.`Return_Status`>0";

            $headSqlAgain="select `Company_Name` from company where `Company_Id`=$comId";
            $headResultAgain=mysqli_query($conn,$headSqlAgain);
            $headRowAgain=mysqli_fetch_assoc($headResultAgain);
            echo "<h3>".$headRowAgain['Company_Name']." Orders</h3>";
        }else{
            $aosql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where orders.`Return_Status`>0 order by `Order_Id` desc";
        }
        $aoresult=mysqli_query($conn,$aosql);
        if(mysqli_num_rows($aoresult)>0){
            while($aorow=mysqli_fetch_assoc($aoresult)){
        ?>
                <div class="order">
                    <div class="order-box image">
                        <img src="./uploadImages/<?php echo $aorow['Product_Img'] ?>" alt="">
                    </div>
                    <div class="order-box">
                        <h2>Order Details</h2>
                        <div class="span-p"><span>Product : </span><span><?php echo $aorow['Product_Name'] ?></span></div>
                        <div><span>Quantity : </span><span><?php echo $aorow['Order_Pieces'] ?></span></div>
                        <div><span>Modal No. : </span><span><?php echo $aorow['Product_Modal_No'] ?></span></div>
                        <div><span>Status : </span><span><?php echo $aorow['Status_Name'] ?></span></div>
                    <?php
                    if($aorow['Delivery_Date']!=""){
                    ?>
                        <div><span>Delivery Date : </span><span><?php echo $aorow['Delivery_Date'] ?></span></div>
                    <?php
                    }
                    ?>
                        <div><span>Order Date : </span><span><?php echo $aorow['Order_Date'] ?></span></div>
                        <div><span>Normal Price : </span><span><?php echo $aorow['Normal_Price'] ?></span></div>
                        <div><span>Discounted Price : </span><span><?php echo $aorow['Discounted_Price'] ?></span></div>
                    <?php
                    if($aorow['Approved']==1){
                    ?>
                        <div><span>Price Approved : </span><span><?php echo $aorow['Approved_Price'] ?></span></div>
                    <?php
                    }
                    ?>
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
                    <?php
                    if($aorow['Return_Status']>0){
                    ?>
                        <div><span>Return Status : </span><span><?php echo $aorow['Return_Mode'] ?></span></div>
                        <div><span>Return Reason : </span><span><?php echo $aorow['Return_Reason'] ?></span></div>
                    <?php
                    }
                    ?>
                    <?php
                    if($aorow['Return_Status']==3){
                    ?>
                        <div><span>Returned Date : </span><span><?php echo $aorow['Return_Date'] ?></span></div>
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
                        <h2>Return Approval</h2>
                        <?php
                        if($aorow['Return_Approvel']==1){
                            $returnDisable="style='background-color:grey;pointer-events:none;'";
                        }else{
                            $returnDisable="";
                        }
                        ?>
                        <a href="returnOrders.php?returnOrderApproveId=<?php echo $aorow['Order_Id'] ?>" <?php echo $returnDisable ?>><?php echo $aorow['Return_Approvel']==0?"Approve":"Approved";  ?></a>
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
                    <h2>Return Status</h2>
                    <form style="margin-top:5px;" action="returnOrders.php?<?php echo $compId ?><?php echo $dateId ?><?php echo $statusId ?>" method="post">
                        <?php
                        if($aorow['Return_Date']!==""){
                            $disabling="style='background-color:lightgrey' disabled";
                        }else{
                            $disabling="";
                        }
                        ?>
                        <input type="hidden" name="returnStatus" value="<?php echo $aorow['Return_Status'] ?>">
                        <input type="hidden" name="oderId" value="<?php echo $aorow['Order_Id'] ?>">
                        <label for="returnDate" style="color:green">Return Date : </label><br>
                        <input class="order-input" type="date" max="<?php echo date("Y-m-d") ?>" name="returnDate" id="returnDate" value="<?php echo $aorow['Return_Date'] ?>" <?php echo $disabling ?>>
                        <input class="order-btn" type="submit" value="save" <?php echo $disabling ?>>
                    </form>
                    <?php
                        $orderstatusSql="select * from returnmode";
                        $orderstatusResult=mysqli_query($conn,$orderstatusSql);
                        if(mysqli_num_rows($orderstatusResult)>0){
                            while($orderstatusRow=mysqli_fetch_assoc($orderstatusResult)){
                                if($aorow['Return_Status']>=$orderstatusRow['Returnmode_Id']){
                                    $disabled="style='background-color:lightgrey;pointer-events:none'";
                                }else{
                                    $disabled="";
                                }
                                if($orderstatusRow['Returnmode_Id']==0){
                                    continue;
                                }
                    ?>
                        <a class="order-button" href="returnOrders.php?<?php echo $compId ?><?php echo $dateId ?><?php echo $statusId ?>oid=<?php echo $aorow['Order_Id'] ?>&osid=<?php echo $orderstatusRow['Returnmode_Id'] ?>&productId=<?php echo $aorow['Product_Id'] ?>" <?php echo $disabled ?>><?php echo $orderstatusRow['Return_Mode'] ?></a>
                    <?php
                            }
                        }
                    ?>
                    </div>
                </div>
        <?php
            }
        }else{
        ?>
        <h2 align="center">No Returning Orders Yet</h2>
        <?php
        }
        ?>
    </div>
    </div>
</section>
<?php include "./components/footer.php" ?>