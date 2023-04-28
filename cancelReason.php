<?php include "./components/header.php" ?>
<section class="cancelFormPage">
    <form action="myOrders.php" method="post">
        <input type="hidden" name="canoid" value="<?php echo $_GET['canoid'] ?>">
        <label for="cancelReason">Cancellation Reason : </label>
        <input type="text" name="cancelReason" id="cancelReason">
        <input type="submit" value="Submit">
    </form>
</section>
<?php include "./components/footer.php" ?>