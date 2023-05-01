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
        if(isset($_SESSION['Company_Id'])){
            $hcid=$_SESSION['Company_Id'];
            $hcSql="select `Company_Name`,`Admin_Type` from company where `Company_Id`=$hcid";
            $hcResult=mysqli_query($conn,$hcSql);
            $hcRow=mysqli_fetch_assoc($hcResult);
        }elseif(isset($_SESSION['User_Id'])){
            $huid=$_SESSION['User_Id'];
            $huSql="select `Username`,`User_Permission` from users where `User_Id`=$huid";
            $huResult=mysqli_query($conn,$huSql);
            $huRow=mysqli_fetch_assoc($huResult);
        }
        ?>
        <div class="helloCompany" id="helloCompany">
        <i class="fa-solid fa-user"></i>
            <div><?php echo isset($hcRow['Company_Name'])?$hcRow['Company_Name']:$huRow['Username'] ?></div>
        </div>
    </header>
    <div class="hellocompanyDropdown" id="hellocompanyDropdown">
        <a href="profile.php">Profile</a>
        <a href="logout.php">Logout</a>
    </div>
    <section class="mainContainer">
        <div class="navbar">
            <a href="dashboard.php">
                <span class="h-icons"><i class="fa-solid fa-house"></i></span>
                Dashboard
            </a>
            <a href="product-category.php">
                <span class="h-icons"><img src="img/product.png"></span>
                Products</a>
            <?php
            if((isset($hcRow['Admin_Type']) and $hcRow['Admin_Type']==1) or isset($huRow['User_Permission'])){
            ?>
                <div class="items">
                    <span class="h-icons"><i class="fa-solid fa-layer-group"></i></span>
                    <span>MasterForms</span><span></span>
                </div>
                <div class="itemDropdown">
                    <a href="company.php">
                    <span class="h-icons"><i class="fa-sharp fa-solid fa-building advanceClass"></i></span> 
                        All Companies
                    </a>
                    <?php
                    if(isset($huRow['User_Permission'])){
                        if(str_contains($huRow['User_Permission'],"branches")){
                    ?>
                            <a href="branch.php">
                            <span class="h-icons"><i class="fa-solid fa-code-branch"></i></span> 
                                All Branches</a>
                    <?php
                        }
                    }else{
                    ?>
                        <a href="branch.php">
                        <span class="h-icons"><i class="fa-solid fa-code-branch"></i></span> 
                            All Branches</a>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($huRow['User_Permission'])){
                        if(str_contains($huRow['User_Permission'],"AdminCategory")){
                    ?>
                            <a href="category.php">
                            <span class="h-icons"><i class="fa-solid fa-user"></i></span> 
                                Admin Category</a>
                    <?php
                        }
                    }else{
                    ?>
                        <a href="category.php">
                        <span class="h-icons"><i class="fa-solid fa-user"></i></span> 
                            Admin Category</a>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($huRow['User_Permission'])){
                        if(str_contains($huRow['User_Permission'],"productCategory")){
                    ?>
                            <a href="PCategory.php">
                            <span class="h-icons"><i class="fa-solid fa-clipboard"></i></span> 
                                Product Category</a>
                    <?php
                        }
                    }else{
                    ?>
                        <a href="PCategory.php">
                        <span class="h-icons"><i class="fa-solid fa-clipboard"></i></span> 
                            Product Category</a>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($huRow['User_Permission'])){
                        if(str_contains($huRow['User_Permission'],"product")){
                    ?>
                            <a href="product.php">
                            <span class="h-icons"><i class="fa-solid fa-file"></i></span> 
                                Products</a>
                    <?php
                        }
                    }else{
                    ?>
                        <a href="product.php">
                        <span class="h-icons"><i class="fa-solid fa-file"></i></span> 
                            Products</a>
                    <?php
                    }
                    ?>
                    <?php
                    if(isset($huRow['User_Permission'])){
                        if(str_contains($huRow['User_Permission'],"orders")){
                    ?>
                            <a href="orders.php">
                            <span class="h-icons"><img src="img/product.png"></span> 
                                All Orders</a>
                    <?php
                        }
                    }else{
                    ?>
                        <a href="orders.php">
                        <span class="h-icons"><img src="img/product.png"></span> 
                            All Orders</a>
                    <?php
                    }
                    ?>
                    <?php
                    if(!isset($huRow['User_Permission'])){
                    ?>
                    <a href="users.php">Users</a>
                    <?php
                    }
                    ?>
                </div>
            <?php
            }
            ?>
            <a href="myBranch.php">
                <span class="h-icons"><i class="fa-solid fa-briefcase"></i></span>
                My Branch</a>
            <a href="myOrders.php">
            <span class="h-icons"><i class="fa-sharp fa-solid fa-cart-shopping advanceClass"></i></span>
                My Orders</a>
        </div>