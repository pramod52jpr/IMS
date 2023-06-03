<?php
include "conn.php";
if(isset($_GET['export'])){
    $date=date("d-m-Y");
    header('Content-Type:application/xls');
    if($_GET['export']=='orders'){
        $sql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id`";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $data="<table border='1px'><tr><td>Product Name</td><td>Quantity</td><td>Model No.</td><td>Order Status</td><td>Order Date</td><td>Normal Price</td><td>Discounted Price</td><td>Company Name</td><td>Contect No.</td><td>Email Id</td><td>Address</td></tr>";
            while($row=mysqli_fetch_assoc($result)){
                $data.="<tr><td>$row[Product_Name]</td><td>$row[Order_Pieces]</td><td>$row[Product_Modal_No]</td><td>$row[Status_Name]</td><td>$row[Order_Date]</td><td>$row[Normal_Price]</td><td>$row[Discounted_Price]</td><td>$row[Company_Name]</td><td>$row[Company_Phone]</td><td>$row[Company_Email]</td><td>$row[Company_Address]</td></tr>";
            }
            $data.="</table>";
            header("Content-Disposition:attachment;filename=Orders($date).xls");
            echo $data;
        }
    }
    if($_GET['export']=='returnOrders'){
        $sql="select * from orders join product on orders.`Product_Id`=product.`Product_Id` join orderstatus on orderstatus.`Status_Id`=orders.`Order_Status` join company on company.`Company_Id`=orders.`Company_Id` left join deliverymode on orders.`Delievery_Mode`=deliverymode.`Delivery_Id` join returnmode on orders.`Return_Status`=returnmode.`Returnmode_Id` where orders.`Return_Status`>0";
        $result=mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $data="<table border='1px'><tr><td>Product Name</td><td>Quantity</td><td>Model No.</td><td>Order Status</td><td>Order Date</td><td>Normal Price</td><td>Discounted Price</td><td>Return Status</td><td>Return Reason</td><td>Company Name</td><td>Contect No.</td><td>Email Id</td><td>Address</td></tr>";
            while($row=mysqli_fetch_assoc($result)){
                $data.="<tr><td>$row[Product_Name]</td><td>$row[Order_Pieces]</td><td>$row[Product_Modal_No]</td><td>$row[Status_Name]</td><td>$row[Order_Date]</td><td>$row[Normal_Price]</td><td>$row[Discounted_Price]</td><td>$row[Return_Mode]</td><td>$row[Return_Reason]</td><td>$row[Company_Name]</td><td>$row[Company_Phone]</td><td>$row[Company_Email]</td><td>$row[Company_Address]</td></tr>";
            }
            $data.="</table>";
            header("Content-Disposition:attachment;filename=ReturnOrders($date).xls");
            echo $data;
        }
    }
}

?>