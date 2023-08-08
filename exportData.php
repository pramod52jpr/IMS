<?php
include "conn.php";
session_start();
if(isset($_SESSION['User_Id'])){
    $huid = $_SESSION['User_Id'];
}
if(isset($_GET['export'])){
    $date=date("d-m-Y");
    header('Content-Type:application/xls');
    if($_GET['export']=='orders'){
        if(isset($_SESSION['User_Id'])){
            $sql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` where company.`userId`=$huid";
        }else{
            $sql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id`";
        }
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $quantity=0;
            $data="<table border='1px'><tr><th>Product Name</th><th>Quantity</th><th>Model No.</th><th>Order Status</th><th>Order Date</th><th>Normal Price</th><th>Discounted Price</th><th>Company Name</th><th>Contect No.</th><th>Email Id</th><th>Address</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
                $data.="<tr><td>$row[Product_Name]</td><td>$row[Order_Pieces]</td><td>$row[Product_Modal_No]</td><td>$row[Status_Name]</td><td>$row[Order_Date]</td><td>$row[Normal_Price]</td><td>$row[Discounted_Price]</td><td>$row[Company_Name]</td><td>$row[Company_Phone]</td><td>$row[Company_Email]</td><td>$row[Company_Address]</td></tr>";
                $quantity+=$row['Order_Pieces'];
            }
            $data.="<tr><th>Total</th><th>$quantity</th></tr>";
            $data.="</table>";
            header("Content-Disposition:attachment;filename=Orders($date).xls");
            echo $data;
        }
    }
    if($_GET['export']=='returnOrders'){
        if(isset($_SESSION['User_Id'])){
            $sql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where orders.`Return_Status`>0 and company.`userId`=$huid";
        }else{
            $sql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where orders.`Return_Status`>0";
        }
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $quantity=0;
            $data="<table border='1px'><tr><th>Product Name</th><th>Quantity</th><th>Model No.</th><th>Order Status</th><th>Order Date</th><th>Normal Price</th><th>Discounted Price</th><th>Return Status</th><th>Return Reason</th><th>Company Name</th><th>Contect No.</th><th>Email Id</th><th>Address</th></tr>";
            while($row=mysqli_fetch_assoc($result)){
                $data.="<tr><td>$row[Product_Name]</td><td>$row[Order_Pieces]</td><td>$row[Product_Modal_No]</td><td>$row[Status_Name]</td><td>$row[Order_Date]</td><td>$row[Normal_Price]</td><td>$row[Discounted_Price]</td><td>$row[Return_Mode]</td><td>$row[Return_Reason]</td><td>$row[Company_Name]</td><td>$row[Company_Phone]</td><td>$row[Company_Email]</td><td>$row[Company_Address]</td></tr>";
                $quantity+=$row['Order_Pieces'];
            }
            $data.="<tr><th>Total</th><th>$quantity</th></tr>";
            $data.="</table>";
            header("Content-Disposition:attachment;filename=ReturnOrders($date).xls");
            echo $data;
        }
    }
}
session_abort();
?>