<?php include "conn.php" ?>
<?php include "./components/header.php" ?>
<?php
if(isset($_GET['pid']) and isset($_GET['cid'])){
    $pid=$_GET['pid'];
    $cid=$_GET['cid'];
}
?>
<section class="addBuyProductFormContainer">
    <form class="buyProductAddForm" action="myOrders.php" method="post">
        <input type="hidden" name="pid" value="<?php echo $pid ?>">
        <label for="piece">No. of Pieces</label>
        <input type="number" name="piece" id="piece" value="1" required>
        </select>
        <div class="addBuyProductFormBtn">
            <input class="btn" type="submit" value="Order">
            <a class="btn" href="buyProduct.php?cid=<?php echo $cid ?>">Cancel</a>
        </div>
    </form>
</section>
<?php include "./components/footer.php" ?>