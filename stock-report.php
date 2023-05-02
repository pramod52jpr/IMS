<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<?php
if(isset($_POST['productName']) and isset($_FILES['productImg'])){
    $productName=$_POST['productName'];
    $productModal=$_POST['productModal'];
    $productQuantity=$_POST['productQuantity'];
    $productCategory=$_POST['productCategory'];
    $productNormalPrice=$_POST['productNormalPrice'];
    $productDiscountedPrice=$_POST['productDiscountedPrice'];
    $image=$_FILES['productImg'];
        $tmp_name=$image['tmp_name'];
        $img_name=$image['name'];
    $duplicateSql="select `Product_Modal_No` from product where `Product_Modal_No`='$productModal'";
    $duplicateResult=mysqli_query($conn,$duplicateSql);
    if(mysqli_num_rows($duplicateResult)>0){
        echo "<script>alert('Product Already Added! Plz Try Another One')</script>";
    }else{
        move_uploaded_file($tmp_name,"./uploadImages/$img_name");
        $addSql="insert into product(`Product_Name`,`Product_Modal_No`,`P_Category_Id`,`Quantity`,`Product_Img`,`Normal_Price`,`Discounted_Price`) values('$productName','$productModal','$productCategory',$productQuantity,'$img_name',$productNormalPrice,$productDiscountedPrice)";
        $addResult=mysqli_query($conn,$addSql);
        if($addResult){
            echo "<script>alert('Product Added Successfully')</script>";
        }else{
            echo "<script>alert('Product not Added')</script>";
        }
    }
}
if(isset($_POST['productUpdatedName']) and isset($_POST['updatepid'])){
    $updatepid=$_POST['updatepid'];
    $productUpdatedName=$_POST['productUpdatedName'];
    $productUpdatedModal=$_POST['productUpdatedModal'];
    $productUpdatedCategory=$_POST['productUpdatedCategory'];
    $productUpdatedQuantity=$_POST['productUpdatedQuantity'];
    $productUpdatedNormalPrice=$_POST['productUpdatedNormalPrice'];
    $productUpdatedDiscountedPrice=$_POST['productUpdatedDiscountedPrice'];
    $updateImage=$_FILES['productUpdatedImage'];
        $updated_tmp_name=$updateImage['tmp_name'];
        $updated_img_name=$updateImage['name'];
    move_uploaded_file($updated_tmp_name,"./uploadImages/$updated_img_name");
    $updateSql="update product set `Product_Name`='$productUpdatedName',`Quantity`=$productUpdatedQuantity,`Normal_Price`=$productUpdatedNormalPrice,`Discounted_Price`=$productUpdatedDiscountedPrice,`Product_Modal_No`='$productUpdatedModal',`Product_Img`='$updated_img_name',`P_Category_Id`='$productUpdatedCategory' where `Product_Id`=$updatepid";
    $updateResult=mysqli_query($conn,$updateSql);
    if($updateResult){
        echo "<script>alert('Product Updated Successfully')</script>";
    }else{
        echo "<script>alert('Product not Updated')</script>";
    }
}
if(isset($_GET['dpid'])){
    $dpid=$_GET['dpid'];
    $deleteSql="delete from product where `Product_Id`=$dpid";
    $deleteResult=mysqli_query($conn,$deleteSql);
    if($deleteResult){
        echo "<script>alert('Product Deleted Successfully')</script>";
    }else{
        echo "<script>alert('Product not Deleted')</script>";
    }
}
if(isset($_POST['quantity']) and isset($_POST['proId'])){
    $proId=$_POST['proId'];
    $quantity=$_POST['quantity'];

    $oldQuantitySql="select `Quantity` from product where `Product_Id`=$proId";
    $oldQuantityResult=mysqli_query($conn,$oldQuantitySql);
    $oldQuantityRow=mysqli_fetch_assoc($oldQuantityResult);
    $oldQuantity=$oldQuantityRow['Quantity'];

    $newQuantity=$oldQuantity+$quantity;
    $newDate=date("Y-m-d");
    $addQuantitySql="update product set `Quantity`=$newQuantity,`Latest_Stock_Date`='$newDate' where `Product_Id`=$proId";
    $addQuantityResult=mysqli_query($conn,$addQuantitySql);

    $stockSql="insert into stockreport (`Stock_Amount`,`Product_Id`) values($quantity,$proId)";
    $stockResult=mysqli_query($conn,$stockSql);
    if($addQuantityResult and $stockResult){
        echo "<script>alert('Quantity added Successfully')</script>";
    }else{
        echo "<script>alert('Quantity not added')</script>";
    }
}

?>
<section class="machinePage">
    <h2>Reports</h2>
    <div class="machineContainer">
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Modal No.</th>
                    <th>Quantity</th>
                    <th>Stock Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from stockreport join product on product.`Product_Id`=stockreport.`Product_Id`";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Product_Name'] ?></td>
                    <td><?php echo $row['Product_Modal_No'] ?></td>
                    <td><?php echo $row['Added_Quantity'] ?></td>
                    <td><?php echo implode("/",array_reverse(explode("-",$row['Stock_Date']))) ?></td>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="6" style="text-align:center;font-size:20px">No New Stock Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>