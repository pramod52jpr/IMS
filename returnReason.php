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
        <input type="hidden" name="retoid" value="<?php echo $_GET['retoid'] ?>">
        <label for="returnPieces">No. of Piece : </label>
        <input type="number" name="returnPieces" id="returnPieces" required>
        <label for="returnReason">Return Reason : </label>
        <input type="text" name="returnReason" id="returnReason" required>
        <input type="submit" value="Submit">
    </form>
</section>
<?php include "./components/footer.php" ?>