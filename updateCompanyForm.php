<?php include "conn.php" ?>
<?php
session_start();
if (!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])) {
    Header("Location: $lDomain");
}
session_abort();
if (isset($_GET['search'])) {
    $searchInput = "<input type='hidden' name='search' value='$_GET[search]'>";
} else {
    $searchInput = "";
}
?>
<?php include "./components/header.php" ?>
<section class="updateCompanyPage">
    <?php
    if (isset($_GET['comId'])) {
        $comId = $_GET['comId'];
        $comSql = "select * from company join category on company.`Admin_Type`=category.`Category_Id` where `Company_Id`=$comId";
        $ComResult = mysqli_query($conn, $comSql);
        $comRow = mysqli_fetch_assoc($ComResult);
    }
    ?>
    <h2>Company Master</h2>
    <form class="updateCompanyForm" action="company.php" method="post">
        <h4 class="heading">Company Details</h4>
        <?php echo $searchInput ?>
        <div class="row">
            <div class="col-25">
                <label class="labelfill" for="companyCode">Company Code</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_Code'] ?>" name="companyCode"
                    id="companyCode" disabled required>
            </div>
            <div class="col-25">
                <label class="labelfill" for="companyCategory">category</label>
            </div>
            <div class="col-25">
                <select name="companyCategory" id="companyCategory" required>
                    <?php
                    $adminsql = "select * from category";
                    $adminResult = mysqli_query($conn, $adminsql);
                    if (mysqli_num_rows($adminResult) > 0) {
                        while ($adminRow = mysqli_fetch_assoc($adminResult)) {
                            if ($comRow['Admin_Type'] == $adminRow['Category_Id']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $adminRow['Category_Id'] ?>" <?php echo $selected ?>>
                                <?php echo $adminRow['Category_Name'] ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row2">
            <input type="hidden" name="comId" value="<?php echo $comId ?>">
            <div class="col-25">
                <label class="labelfill" for="companyName">Company Name</label>
            </div>
            <div class="col-25">
                <input type="text" class="inputfill" value="<?php echo $comRow['Company_Name'] ?>" name="companyName"
                    id="companyName" required>
            </div>
            <div class="col-25">
                <label class="labelfill" for="companyContact">Contact No.</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="tel" value="<?php echo $comRow['Company_Phone'] ?>" name="companyContact"
                    id="companyContact" required>
            </div>
        </div>
        <div class="row3">
            <div class="col-25">
                <label class="labelfill" for="companyEmail">Email Id</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="email" value="<?php echo $comRow['Company_Email'] ?>" name="companyEmail"
                    id="companyEmail" required>
            </div>
            <div class="col-25">
                <label class="labelfill" for="companyAddress">Address</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_Address'] ?>"
                    name="companyAddress" id="companyAddress" required>
            </div>
        </div>
        <div class="row3">
            <div class="col-25">
                <label class="labelfill" for="companyUsername">Username</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_Username'] ?>"
                    name="companyUsername" id="companyUsername" required>
            </div>
            <div class="col-25">
                <label class="labelfill" for="companyPassword">Password</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_Password'] ?>"
                    name="companyPassword" id="companyPassword" required>
            </div>
        </div>
        <div class="row3">
            <div class="col-25">
                <label class="labelfill" for="companyGst">GST Number</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_GST'] ?>" name="companyGst"
                    id="companyGst">
            </div>
            <div class="col-25">
                <label class="labelfill" for="companyPan">PAN Number</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_PAN'] ?>" name="companyPan"
                    id="companyPan">
            </div>
        </div>
        <div class="row3">
            <div class="col-25">
                <label class="labelfill" for="companyTan">TAN Number</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_TAN'] ?>" name="companyTan"
                    id="companyTan">
            </div>
            <div class="col-25">
                <label class="labelfill" for="companyLicence">Licence Number</label>
            </div>
            <div class="col-25">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_Licence'] ?>"
                    name="companyLicence" id="companyLicence">
            </div>
        </div>
        <div class="row4">
            <div class="col-25 col-26">
                <label class="labelfill" for="companyRgNo">Registration Number</label>
            </div>
            <div class="col-25 col-26">
                <input class="inputfill" type="text" value="<?php echo $comRow['Company_Registration'] ?>"
                    name="companyRgNo" id="companyRgNo">
            </div>
            <div class="col-25">
                <label class="labelfill" for="user">User</label>
            </div>
            <div class="col-25">
                <select name="user" id="user" required>
                    <?php
                    $userssql = "select * from users";
                    $usersResult = mysqli_query($conn, $userssql);
                    if (mysqli_num_rows($usersResult) > 0) {
                        while ($usersRow = mysqli_fetch_assoc($usersResult)) {
                            if ($comRow['userId'] == $usersRow['User_Id']) {
                                $selected = "selected";
                            } else {
                                $selected = "";
                            }
                            ?>
                            <option value="<?php echo $usersRow['User_Id'] ?>" <?php echo $selected ?>>
                                <?php echo $usersRow['Username'] ?>
                            </option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="updateCompanyBtn newbtn">
            <input class="btn" type="submit" value="Update">
            <a class="btn" href="javascript:history.go(-1)">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>