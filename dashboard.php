<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
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
        $Lastweek=30+(intval(date("d"))-7)<10?"0".(30+(intval(date("d"))-7)):(30+(intval(date("d"))-7));
        $lastWeekMonth=(intval(date("m"))-1)<10?"0".(intval(date("m"))-1):(intval(date("m"))-1);
        if($lastWeekMonth<1){
            $lastWeekMonth=(12+$lastWeekMonth)<10?"0".(12+$lastWeekMonth):(12+$lastWeekMonth);
            $lastWeekYear=intval(date("Y"))-1;
        }else{
            $lastWeekYear=intval(date("Y"));
        }
    }else{
        $Lastweek=intval(date("d"))-7<10?"0".intval(date("d"))-7:intval(date("d"))-7;
        $lastWeekMonth=intval(date("m"))<10?"0".intval(date("m")):intval(date("m"));
        $lastWeekYear=intval(date("Y"));
    }
    $lastweekDate=date("$lastWeekYear-$lastWeekMonth-$Lastweek");
    $last2DaysOrderSql="select * from orders where `Order_Date`>'$lastweekDate' group by `cart_no`";
    $lastWeekOrderResult=mysqli_query($conn,$last2DaysOrderSql);
// last month sql code
    if((intval(date("m"))-1)<1){
        $LastMonth=(12+(intval(date("m"))-1))<10?"0".(12+(intval(date("m"))-1)):(12+(intval(date("m"))-1));
        $LastMonthYear=intval(date("Y"))-1;
    }else{
        $LastMonth=(intval(date("m"))-1)<10?"0".(intval(date("m"))-1):(intval(date("m"))-1);
        $LastMonthYear=intval(date("Y"));
    }
    $lastMonthDate=date("$LastMonthYear-$LastMonth-d");
    $lastMonthOrderSql="select * from orders where `Order_Date`>'$lastMonthDate' group by `cart_no`";
    $lastMonthOrderResult=mysqli_query($conn,$lastMonthOrderSql);
// all Orders sql code
    $allOrderSql="select * from orders group by `cart_no`";
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
                <a href="allOrders.php?weekDate=<?php echo $lastweekDate ?>">
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
                <a href="allOrders.php?monthDate=<?php echo $lastMonthDate ?>">
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
                <a href="allOrders.php">
                <span class="title">View Order</span>
                <i class="fa-solid fa-cart-shopping"></i></a>
            </div>
        </div>
        <div class="items">
            <div class="inner-item1">
                <h3>Company</h3>
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
    <section class="branchPage">
        <?php
        $sql="select count(`cart_no`) as items,`cart_no`,`Order_Date`,`Username`,`Company_Name` from orders join company on orders.`Company_Id`=company.`Company_Id` join users on company.`userId`=users.`User_Id` where `Order_Date`='$todayDate' group by `cart_no`";
        ?>
        <div class="branchContainer">
            <table>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>No. of Items</th>
                        <th>User</th>
                        <th>Company Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                            $successSql="select `cart_no` from orders where `cart_no`='$row[cart_no]' and `Delievery_Mode`=4";
                            $successResult=mysqli_query($conn,$successSql);
                            if(mysqli_num_rows($successResult)==$row['items']){
                                $success="style='background-color:lightGreen'";
                            }else{
                                $success="";
                            }
                    ?>
                    <tr <?php echo $success ?>>
                        <td><?php echo $row['cart_no'] ?></td>
                        <td><?php echo $row['Order_Date'] ?></td>
                        <td><?php echo $row['items'] ?></td>
                        <td><?php echo $row['Username'] ?></td>
                        <td><?php echo $row['Company_Name'] ?></td>
                        <td><a href="orders.php?orderNo=<?php echo $row['cart_no'] ?>">View</a>
                    </tr>
                    <?php
                        }
                    }else{
                    ?>
                    <tr>
                        <td colspan="6" style="text-align:center;font-size:20px">No Orders Yet</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php 
    }elseif($adminRow['Admin_Type']==2){
    // last 2 days sql code
        $todayDate=date("Y-m-d");
        if((intval(date("d"))-2)<1){
            $Last2Days=(30+(intval(date("d"))-2))<10?"0".(30+(intval(date("d"))-2)):(30+(intval(date("d"))-2));
            $last2DaysMonth=(intval(date("m"))-1)<10?"0".(intval(date("m"))-1):(intval(date("m"))-1);
            if($last2DaysMonth<1){
                $last2DaysMonth=(12+$last2DaysMonth)?"0".(12+$last2DaysMonth):(12+$last2DaysMonth);
                $last2DaysYear=intval(date("Y"))-1;
            }else{
                $last2DaysYear=intval(date("Y"));
            }
        }else{
            $Last2Days=(intval(date("d"))-2)<10?"0".(intval(date("d"))-2):(intval(date("d"))-2);
            $last2DaysMonth=intval(date("m"))<10?"0".intval(date("m")):intval(date("m"));
            $last2DaysYear=intval(date("Y"));
        }
        $last2DaysDate=date("$last2DaysYear-$last2DaysMonth-$Last2Days");
        $last2DaysOrderSql="select * from orders where `Company_Id`=$companyId and `Order_Date`>'$last2DaysDate'";
        $last2DaysOrderResult=mysqli_query($conn,$last2DaysOrderSql);
    // last One week sql code
        if((intval(date("d"))-7)<1){
            $LastWeekDays=(30+(intval(date("d"))-7))<10?"0".(30+(intval(date("d"))-7)):(30+(intval(date("d"))-7));
            $lastWeekDaysMonth=(intval(date("m"))-1)<10?"0".(intval(date("m"))-1):(intval(date("m"))-1);
            if($lastWeekDaysMonth<1){
                $lastWeekDaysMonth=(12+$lastWeekDaysMonth)<10?"0".(12+$lastWeekDaysMonth):(12+$lastWeekDaysMonth);
                $lastWeekDaysYear=intval(date("Y"))-1;
            }else{
                $lastWeekDaysYear=intval(date("Y"));
            }
        }else{
            $LastWeekDays=(intval(date("d"))-7)<10?"0".(intval(date("d"))-7):(intval(date("d"))-7);
            $lastWeekDaysMonth=intval(date("m"))<10?"0".intval(date("m")):intval(date("m"));
            $lastWeekDaysYear=intval(date("Y"));
        }
        $lastWeekDaysDate=date("$lastWeekDaysYear-$lastWeekDaysMonth-$LastWeekDays");
        $lastWeekDaysOrderSql="select * from orders where `Company_Id`=$companyId and `Order_Date`>'$lastWeekDaysDate'";
        $lastWeekDaysOrderResult=mysqli_query($conn,$lastWeekDaysOrderSql);
    // Last One Month sql code
        if((intval(date("m"))-1)<1){
            $LastMonth=(12+(intval(date("m"))-1))<10?"0".(12+(intval(date("m"))-1)):(12+(intval(date("m"))-1));
            $LastMonthYear=intval(date("Y"))-1;
        }else{
            $LastMonth=(intval(date("m"))-1)<10?"0".(intval(date("m"))-1):(intval(date("m"))-1);
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
        <div class="inner-item1">
            <h3>Last 2 Days Orders</h3>
            <h2><?php echo mysqli_num_rows($last2DaysOrderResult) ?></h2>
            <p>Items Ordered</p>
        </div>
        <div class="inner-item2">
            <a href="myOrders.php?twoDaysDate=<?php echo $last2DaysDate ?>">
            <span class="title">View Order</span>
            <i class="fa-solid fa-cart-shopping"></i></a>
        </a>
        </div>
        </div>
        <div class="items">
        <div class="inner-item1">
            <h3>Last Week Orders</h3>
            <h2><?php echo mysqli_num_rows($lastWeekDaysOrderResult) ?></h2>
            <p>Items Ordered</p>
        </div>
        <div class="inner-item2">
            <a href="myOrders.php?weekDate=<?php echo $lastWeekDaysDate ?>">
            <span class="title">View Order</span>
            <i class="fa-solid fa-cart-shopping"></i></a>
        </a>
        </div>
        </div>
        <div class="items">
        <div class="inner-item1">
            <h3>Last Month Orders</h3>
            <h2><?php echo mysqli_num_rows($lastMonthOrderResult) ?></h2>
            <p>Items Ordered</p>
        </div>
        <div class="inner-item2">
            <a href="myOrders.php?monthDate=<?php echo $lastMonthDate ?>">
            <span class="title">View Order</span>
            <i class="fa-solid fa-cart-shopping"></i></a>
        </a>
        </div>
        </div>
        <div class="items">
        <div class="inner-item1">
            <h3>Order Recieved</h3>
            <h2><?php echo mysqli_num_rows($recievedResult) ?></h2>
            <p>Items Recieved</p>
        </div>
        <div class="inner-item2">
            <a href="myOrders.php?status=4">
            <span class="title">View Order</span>
            <i class="fa-solid fa-cart-shopping"></i></a>
            </a>
        </div>
        </div>
    </div>
    <h1>Today Orders</h1>
    <section class="branchPage">
        <div class="branchContainer">
            <table>
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>Order Date</th>
                        <th>No. of Items</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql="select count(`cart_no`) as items,`cart_no`,`Order_Date` from orders where `Company_Id`=$id and `Order_Date`='$todayDate' group by `cart_no`";
                    $result=mysqli_query($conn,$sql);
                    if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_assoc($result)){
                    ?>
                    <tr>
                        <td><?php echo $row['cart_no'] ?></td>
                        <td><?php echo $row['Order_Date'] ?></td>
                        <td><?php echo $row['items'] ?></td>
                        <td><a href="myOrders.php?orderNo=<?php echo $row['cart_no'] ?>">View</a>
                    </tr>
                    <?php
                        }
                    }else{
                    ?>
                    <tr>
                        <td colspan="6" style="text-align:center;font-size:20px">No Orders Yet</td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </section>
    <?php } ?>
</section>
<?php include "./components/footer.php" ?>