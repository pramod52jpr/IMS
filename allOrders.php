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
<section class="branchPage">
    <div class="heading">
        <?php
        if(isset($_GET['weekDate'])){
            $weekDate=$_GET['weekDate'];
            $sql="select count(`cart_no`) as items,`cart_no`,`Order_Date`,`Username` from orders join company on orders.`Company_Id`=company.`Company_Id` join users on company.`userId`=users.`User_Id` where `Order_Date`>'$weekDate' group by `cart_no`";
            echo "<h2>Last Week Orders</h2>";
        }elseif(isset($_GET['monthDate'])){
            $monthDate=$_GET['monthDate'];
            $sql="select count(`cart_no`) as items,`cart_no`,`Order_Date`,`Username` from orders join company on orders.`Company_Id`=company.`Company_Id` join users on company.`userId`=users.`User_Id` where `Order_Date`>'$monthDate' group by `cart_no`";
            echo "<h2>Last Month Orders</h2>";
        }else{
            echo "<h2>All Orders</h2>";
            $sql="select count(`cart_no`) as items,`cart_no`,`Order_Date`,`Username` from orders join company on orders.`Company_Id`=company.`Company_Id` join users on company.`userId`=users.`User_Id` group by `cart_no`";
        }
        ?>
    </div>
    <div class="branchContainer">
        <table>
            <thead>
                <tr>
                    <th>Order Id</th>
                    <th>Order Date</th>
                    <th>No. of Items</th>
                    <th>User</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['cart_no'] ?></td>
                    <td><?php echo $row['Order_Date'] ?></td>
                    <td><?php echo $row['items'] ?></td>
                    <td><?php echo $row['Username'] ?></td>
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
<?php include "./components/footer.php" ?>