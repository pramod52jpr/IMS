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
    <h2>Return Stock Reports</h2>
    <div class="machineContainer">
        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Model No.</th>
                    <th>Return Pieces</th>
                    <th>Stock Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from returnstock join product on product.`Product_Id`=returnstock.`Product_Id`";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Product_Name'] ?></td>
                    <td><?php echo $row['Product_Modal_No'] ?></td>
                    <td><?php echo $row['Stock_Quantity'] ?></td>
                    <td><?php echo implode("/",array_reverse(explode("-",$row['Return_Date']))) ?></td>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="4" style="text-align:center;font-size:20px">No Returned Stock</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>