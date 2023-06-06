<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php
if(isset($_GET['approve'])){
    $approve=$_GET['approve'];
    $ApprovelSql="update company set `Approvel`=1 where `Company_Id`=$approve";
    $ApprovelResult=mysqli_query($conn,$ApprovelSql);
    if($ApprovelResult){
        echo "<script>alert('Company Approved Successfully')</script>";
    }else{
        echo "<script>alert('Company not Approved')</script>";
    }
}
?>
<?php include "./components/header.php" ?>
<section class="companyPage">
    <div class="heading">
        <h2>Pending For Approval</h2>
    </div>
    <div class="companyContainer">
        <table>
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Contact No.</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Approve</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql="select * from company where `Approvel`=0";
                $result=mysqli_query($conn,$sql);
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <td><?php echo $row['Company_Name'] ?></td>
                    <td><?php echo $row['Company_Phone'] ?></td>
                    <td><?php echo $row['Company_Email'] ?></td>
                    <td><?php echo $row['Company_Address'] ?></td>
                    <td>
                        <a href="?approve=<?php echo $row['Company_Id'] ?>" style="background-color:blue">Approve</a>
                    </td>
                </tr>
                <?php
                    }
                }else{
                ?>
                <tr>
                    <td colspan="10" style="text-align:center;font-size:20px">No Company Pending</td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</section>
<?php include "./components/footer.php" ?>