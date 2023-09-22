<?php include "conn.php" ?>
<?php
session_start();
$id=isset($_SESSION['Company_Id'])?$_SESSION['Company_Id']:1;
if (!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])) {
    Header("Location: $lDomain");
}
session_abort();

if(isset($_GET['comp-id'])){
    $id=$_GET['comp-id'];
}
if(isset($_GET['comp-id'])){
    $comId=$_GET['comp-id'];
    $comp_id="?comp-id=$comId";
}else{
    $comp_id="";
}
?>
<?php
if(isset($_GET['remove'])){
    $remove=$_GET['remove'];
    $removeSql="delete from mycart where `cart_id`=$remove";
    $removeResult=mysqli_query($conn,$removeSql);
    if($removeResult){
        echo "<script>alert('Item Removed Successfully')</script>";
    }else{
        echo "<script>alert('Item Removal Failed')</script>";
    }
}
if(isset($_POST['userId'])){
    $orderSql="select * from mycart join product on mycart.`pro_id`=product.`Product_Id` where mycart.`comp_id`=$id";
    $orderResult=mysqli_query($conn,$orderSql);
    $cartNo=intval(microtime(true)*1000);
    if(mysqli_num_rows($orderResult)>0){
        while($orderRow=mysqli_fetch_assoc($orderResult)){

            $orderDate=date("Y-m-d");

            $insertOrderSql="insert into orders (`Order_Date`,`cart_no`,`Order_Pieces`,`Sale_Price`,`Approved_Price`,`Product_Id`,`Company_Id`,`Delievery_Mode`) values ('$orderDate','$cartNo',$orderRow[quantity],$orderRow[sale_prize],$orderRow[sale_prize],$orderRow[Product_Id],$orderRow[comp_id],$orderRow[delivery_mode])";
            $insertOrderResult=mysqli_query($conn,$insertOrderSql);
        }
        $deleteCartSql="delete from mycart where `comp_id`=$id";
        $deleteCartResult=mysqli_query($conn,$deleteCartSql);
        if($insertOrderResult and $deleteCartResult){
            echo "<script>alert('Order Placed Successfully')</script>";
        }else{
            echo "<script>alert(Order Placing Failed')</script>";
        }
    }
}
?>
<?php include "./components/header.php" ?>
<?php
if(isset($_GET['comp-id'])){
    $id=$_GET['comp-id'];
}
?>
<section class="myOrdersPage">
    <div class="myOrdersContainer">
        <?php
        $osql="select * from mycart join product on mycart.`pro_id`=product.`Product_Id` where mycart.`comp_id`=$id";
        $oresult=mysqli_query($conn,$osql);
        $priceArray=[];
        if(mysqli_num_rows($oresult)>0){
            while($orow=mysqli_fetch_assoc($oresult)){
                $priceArray[]=$orow['quantity']*$orow['sale_prize'];
        ?>
            <div class="Morder">
                <div class="myorder-box image" style="background-image:url('./uploadImages/<?php echo $orow['Product_Img'] ?>')">
                </div>
                <div class="myorder-box">
                    <h2>Order Details</h2>
                    <div><span>Product : </span><span><?php echo $orow['Product_Name'] ?></span></div>
                    <div><span>Quantity : </span><span><?php echo $orow['quantity'] ?></span></div>
                    <div><span>Normal Price : </span><span><?php echo $orow['Normal_Price'] ?></span></div>
                    <div><span>Discounted Price : </span><span><?php echo $orow['Discounted_Price'] ?></span></div>
                    <div><span>Sales Price : </span><span style="color:darkgreen"><?php echo $orow['sale_prize']."/-" ?></span></div>
                    <div><span>Total : </span><span style="color:darkgreen"><?php echo $orow['sale_prize']*$orow['quantity']."/-" ?></span></div>
                    <div><span>Modal No. : </span><span><?php echo $orow['Product_Modal_No'] ?></span></div>
                </div>
                <div class="myorder-boxbtn">
                    <a href="cart.php?remove=<?php echo $orow['cart_id'] ?>">Remove</a>
                </div>
            </div>
        <?php
            }
        }else{
        ?>
        <h2 align="center">No Item Added Yet</h2>
        <?php
        }
        ?>
        <?php
        $totalsql="select `quantity` from mycart join product on mycart.`pro_id`=product.`Product_Id` where mycart.`comp_id`=$id";
        $totalresult=mysqli_query($conn,$osql);
        if(mysqli_num_rows($totalresult)>0){
        ?>
        <div class="total">
            <span>Total Price : </span><span>
                <?php
                echo array_reduce($priceArray,fn($one,$two)=>$one+$two)."/-";
                ?>
            </span>
        </div>
        <div class="orderNow">
            <form action="cart.php<?php echo $comp_id ?>" method="post">
                <input type="hidden" name="userId" value="<?php echo $id ?>">
                <input type="submit" value="Order Now">
            </form>
        </div>
        <?php
        }
        ?>
    </div>
</section>
<?php include "./components/footer.php" ?>