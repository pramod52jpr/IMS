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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <header class="headerContainer">
        <div class="hamburger">
            <i class="fa-solid fa-bars"></i>
        </div>
        <?php
        if (isset($_SESSION['Company_Id'])) {
            $hcid = $_SESSION['Company_Id'];
            $hcSql = "select `Company_Name`,`Admin_Type` from company where `Company_Id`=$hcid";
            $hcResult = mysqli_query($conn, $hcSql);
            $hcRow = mysqli_fetch_assoc($hcResult);
        } elseif (isset($_SESSION['User_Id'])) {
            $huid = $_SESSION['User_Id'];
            $huSql = "select `Username`,`User_Permission` from users where `User_Id`=$huid";
            $huResult = mysqli_query($conn, $huSql);
            $huRow = mysqli_fetch_assoc($huResult);
        }
        ?>
        <div class="helloCompany" id="helloCompany">
            <i class="fa-solid fa-user"></i>
            <div>
                <?php echo isset($hcRow['Company_Name']) ? $hcRow['Company_Name'] : $huRow['Username'] ?>
            </div>
        </div>
    </header>
    <div class="hellocompanyDropdown" id="hellocompanyDropdown">
        <?php
        if (!isset($_SESSION['User_Id'])) {
            ?>
            <a href="profile.php">Profile</a>
            <?php
        }
        ?>
        <a href="logout.php">Logout</a>
    </div>
    <section class="mainContainer">
        <div class="navbar">
            <ul>
                <li>
                    <a href="dashboard.php">
                        <span class="h-icons"><i class="fa-solid fa-house fa-flip"></i></span>
                        <span class="Title">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="product-category.php">
                        <span class="h-icons"><i class="fa-solid fa-bucket fa-flip"></i></span>
                        <span class="Title">Products</span>
                    </a>
                </li>
            </ul>
            <?php
            if ((isset($hcRow['Admin_Type']) and $hcRow['Admin_Type'] == 1) or isset($huRow['User_Permission'])) {
                ?>
                <div class="items">
                    <ul>
                        <li>
                            <a href="#">
                                <span class="h-icons"><i class="fa-solid fa-layer-group fa-flip"></i></span>
                                <span class="Title">MasterForms</span>

                                <span class="Title"><i class="fa-solid fa-caret-down" style="color: #fcfcfc;"></i></span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="itemDropdown">
                    <ul>
                        <?php
                        if (!isset($huRow['User_Permission'])) {
                            ?>
                            <li>
                                <a href="company.php">
                                    <span class="h-icons"><i class="fa-sharp fa-solid fa-building advanceClass fa-flip"></i></span>
                                    <span class="Title">All Companies</span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($huRow['User_Permission'])) {
                            if (str_contains($huRow['User_Permission'], "branches")) {
                                ?>
                                <li>
                                    <a href="branch.php">
                                        <span class="h-icons"><i class="fa-solid fa-code-branch fa-flip"></i></span>
                                        All Branches</a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <a href="branch.php">
                                    <span class="h-icons"><i class="fa-solid fa-code-branch fa-flip"></i></span>
                                    All Branches</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($huRow['User_Permission'])) {
                            if (str_contains($huRow['User_Permission'], "AdminCategory")) {
                                ?>
                                <li>
                                    <a href="category.php">
                                        <span class="h-icons"><i class="fa-solid fa-user fa-flip"></i></span>
                                        Admin Category</a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <a href="category.php">
                                    <span class="h-icons"><i class="fa-solid fa-user fa-flip"></i></span>
                                    Admin Category</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($huRow['User_Permission'])) {
                            if (str_contains($huRow['User_Permission'], "productCategory")) {
                                ?>
                                <li>
                                    <a href="PCategory.php">
                                        <span class="h-icons"><i class="fa-solid fa-bucket fa-flip"></i></span>
                                        Product Category</a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <a href="PCategory.php">
                                    <span class="h-icons"><i class="fa-solid fa-bucket fa-flip"></i></span>
                                    Product Category</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($huRow['User_Permission'])) {
                            if (str_contains($huRow['User_Permission'], "product")) {
                                ?>
                                <li>
                                    <a href="product.php">
                                        <span class="h-icons"><i class="fa-solid fa-bucket fa-flip"></i></span>
                                        Products</a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <a href="product.php">
                                    <span class="h-icon"><i class="fa-solid fa-bucket fa-flip"></i></span>
                                    Products</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (isset($huRow['User_Permission'])) {
                            if (str_contains($huRow['User_Permission'], "orders")) {
                                ?>
                                <li>
                                    <a href="orders.php">
                                        <span class="h-icons"><img src="img/product.png"></span>
                                        All Orders</a>
                                </li>
                                <?php
                            }
                        } else {
                            ?>
                            <li>
                                <a href="orders.php">
                                    <span class="h-icons"><i class="fa-sharp fa-solid fa-cart-shopping advanceClass fa-flip"></i></span>
                                    All Orders</a>
                            </li>
                            <?php
                        }
                        ?>
                        <?php
                        if (!isset($huRow['User_Permission'])) {
                            ?>
                            <li>
                                <a href="users.php">
                                    <span class="h-icons"><i class="fa-solid fa-user fa-flip"></i></span>
                                    Users</a>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
                <?php
            }
            ?>
            <ul>
                <?php
                if (!isset($huRow['User_Permission'])) {
                    ?>
                    <li>
                        <a href="myBranch.php">
                            <span class="h-icons"><i class="fa-solid fa-briefcase "></i></span>
                            <span class="Title"> My Branch</span>
                        </a>
                    </li>
                    <li>
                        <a href="myOrders.php">
                            <span class="h-icons"><i class="fa-sharp fa-solid fa-cart-shopping fa-flip advanceClass"></i></span>
                            <span class="Title"> My Orders</span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (isset($hcRow['Admin_Type']) and $hcRow['Admin_Type'] == 1) {
                    ?>
                    <li>
                        <a href="stock-report.php">
                            <span class="h-icons"><i class="fa-solid fa-notes-medical fa-flip" style="color: #fcfcfc;"></i></span>
                            <span class="Title"> Reports</span>
                        </a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>