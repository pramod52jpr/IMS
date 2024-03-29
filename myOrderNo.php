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
        <h2>My Orders</h2>
    </div>
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
                $sql="select count(`cart_no`) as items,`cart_no`,`Order_Date` from orders where `Company_Id`=$id group by `cart_no`";
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
<?php include "./components/footer.php" ?>