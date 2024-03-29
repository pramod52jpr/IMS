<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="machinePage">
    <h2>Added Stock Reports</h2>
    <div class="machineContainer">
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Model No.</th>
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