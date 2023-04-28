<?php
session_start();
include "conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BioComplaints/Dashboard</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style/dashboard.css">
    <link rel="stylesheet" href="./style/buyProduct.css">
    <link rel="stylesheet" href="./style/buyProductForm.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/profile.css">
    <link rel="stylesheet" href="./style/header.css">
    <link rel="stylesheet" href="./style/company.css">
    <link rel="stylesheet" href="./style/updateCompanyForm.css">
    <link rel="stylesheet" href="./style/branch.css">
    <link rel="stylesheet" href="./style/updateBranchForm.css">
    <link rel="stylesheet" href="./style/category.css">
    <link rel="stylesheet" href="./style/addCategoryForm.css">
    <link rel="stylesheet" href="./style/updateCategoryForm.css">
    <link rel="stylesheet" href="./style/product.css">
    <link rel="stylesheet" href="./style/addProductForm.css">
    <link rel="stylesheet" href="./style/updateProductForm.css">
    <link rel="stylesheet" href="./style/myBranch.css">
    <link rel="stylesheet" href="./style/addMyBranchForm.css">
    <link rel="stylesheet" href="./style/updateMyBranchForm.css">
    <link rel="stylesheet" href="./style/updateMyBranchForm.css">
    <link rel="stylesheet" href="./style/PCategory.css">
    <link rel="stylesheet" href="./style/addPCategoryForm.css">
    <link rel="stylesheet" href="./style/updatePCategoryForm.css">
    <link rel="stylesheet" href="./style/orders.css">
    <link rel="stylesheet" href="./style/myOrders.css">
    <link rel="stylesheet" href="./style/cancelReason.css">
    <link rel="stylesheet" href="./style/product-category.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header class="headerContainer">
    <div class="hamburger">
        <i class="fa-solid fa-bars"></i>
        </div>
        <?php
        $hid=$_SESSION['Company_Id'];
        $hSql="select `Company_Name`,`Admin_Type` from company where `Company_Id`=$hid";
        $hResult=mysqli_query($conn,$hSql);
        $hRow=mysqli_fetch_assoc($hResult);
        ?>
        <div class="helloCompany" id="helloCompany">
        <i class="fa-solid fa-user"></i>
            <div><?php echo $hRow['Company_Name'] ?></div>
        </div>
    </header>
    <div class="hellocompanyDropdown" id="hellocompanyDropdown">
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <section class="mainContainer">
        <div class="navbar">
            <a href="dashboard.php">Dashboard</a>
            <a href="product-category.php">Products</a>
            <?php
            if($hRow['Admin_Type']==1){
            ?>
                <div class="items"><span>MasterForms</span><span>></span></div>
                <div class="itemDropdown">
                    <a href="company.php">All Companies</a>
                    <a href="branch.php">All Branches</a>
                    <a href="category.php">Admin Category</a>
                    <a href="PCategory.php">Product Category</a>
                    <a href="product.php">Products</a>
                    <a href="orders.php">All Orders</a>
                </div>
            <?php
            }
            ?>
            <a href="myBranch.php">My Branch</a>
            <a href="myOrders.php">My Orders</a>
        </div>