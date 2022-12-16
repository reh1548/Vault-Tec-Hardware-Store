<?php if (isset($getProductData) && is_array($getProductData)) { ?>
    <?php if (isset($successMsg) && $successMsg == true) { ?>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <img src="../public/<?php echo $getProductData['image'] ?>" class="rounded img-thumbnail mr-2" style="width:40px;"><?php echo $getProductData['title'] ?> is added to cart. <a href="cartController.php" class="alert-link">View Cart</a>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="row mt-3">
        <div class="col-md-5">
            <img src="../public/<?php echo $getProductData['image'] ?>">
        </div>
        <div class="col-md-7" style="margin-top: 80px;">
            <h1><?php echo $getProductData['title'] ?></h1>
            <p><?php echo $getProductData['description'] ?></p>
            <h4>$<?php echo $getProductData['price'] ?></h4>

            <form class="form-inline" method="POST">
                <div class="form-group mb-2">
                    <input type="number" name="product_qty" id="productQty" class="form-control" placeholder="Quantity" min="1" max="100" value="1">
                    <input type="hidden" name="product_id" value="<?php echo $getProductData['id'] ?>">
                </div>
                <div class="form-group mb-2 ml-2">
                    <button type="submit" class="btn btn-primary" name="add_to_cart" value="add to cart">Add to Cart</button>
                </div>
            </form>

        </div>
    </div>

<?php
}
?>