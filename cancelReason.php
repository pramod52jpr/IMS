<?php include "conn.php" ?>
<?php
session_start();
if(!isset($_SESSION['Company_Id']) and !isset($_SESSION['User_Id'])){
    Header("Location: $lDomain");
}
session_abort();
?>
<?php include "./components/header.php" ?>
<section class="cancelFormPage">
    <form action="myOrders.php" method="post">
        <input type="hidden" name="canoid" value="<?php echo $_GET['canoid'] ?>">
        <label for="cancelReason">Cancellation Reason : </label>
        <input type="text" name="cancelReason" id="cancelReason" required>
        <input type="submit" value="Submit">
    </form>
</section>
<?php include "./components/footer.php" ?>