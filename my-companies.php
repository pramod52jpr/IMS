<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
if(isset($_SESSION['User_Id'])){
    $userId=$_SESSION['User_Id'];
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="companyPage">
    <div class="heading">
        <h2>Company Master</h2>
        <div class="search">
            <form action="" method="get">
                <input type="text" value="<?php echo isset($_GET['search'])?$_GET['search']:(isset($_POST['search'])?$_POST['search']:'') ?>" name="search" id="search">
                <input type="submit" value="Search">
            </form>
        </div>
    </div>
    <div class="companyContainer">
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Admin Type</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Order</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($_GET['search']) or isset($_POST['search'])){
                    $search=isset($_GET['search'])?$_GET['search']:$_POST['search'];
                    $sql="select * from company join category on company.`Admin_Type`=category.`Category_Id` where `userId`=$userId and `Approvel`=1 and `Company_Name` like '%$search%'";
                }else{
                    $sql="select * from company join category on company.`Admin_Type`=category.`Category_Id` where `userId`=$userId and `Approvel`=1";
                }
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Company_Name'] ?></td>
                    <td><?php echo $row['Category_Name'] ?></td>
                    <td><?php echo $row['Company_Phone'] ?></td>
                    <td><?php echo $row['Company_Email'] ?></td>
                    <td><?php echo $row['Company_Address'] ?></td>
                    <td style="display: flex;align-items: center;">
                        <a href="product-category.php?comp-id=<?php echo $row['Company_Id'] ?>" style="background-color: transparent;">
                            <i class="fa-solid fa-bucket" style="font-size: 20px;color: blue;"></i>
                        </a>
                        <a href="cart.php?comp-id=<?php echo $row['Company_Id'] ?>" style="background-color: transparent;margin-top:10px">
                            <?php
                            $cartCountSql="select * from mycart where `comp_id`=$row[Company_Id]";
                            $cartCountResult=mysqli_query($conn,$cartCountSql);
                            $cartCount=mysqli_num_rows($cartCountResult);
                            ?>
                            <div class="cartCount"><?php echo $cartCount ?></div>
                            <i class="fa-sharp fa-solid fa-cart-shopping advanceClass" style="font-size: 20px;color: blue;"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="10" style="text-align:center;font-size:20px">No Company Added</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>