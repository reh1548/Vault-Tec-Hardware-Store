<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Product" name="search">
        <div class="input-group-append">
            <button class="btn-btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>

</form>
<h2>Featured Products</h2>
<div class="row">
    
    <?php
    foreach ($getAllProducts as $product) {
    ?>
        <div class="col-md-3  mt-2">
            <div class="card">
                <a href="../controllers/singleProductCartController.php?id=<?php echo $product['id'] ?>">
                    <img class="card-img-top" src="../public/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>">
                </a>
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="../controllers/singleProductCartController.php?id=<?php echo $product['id'] ?>">
                            <?php echo $product['title']; ?>
                        </a>
                    </h5>
                    <strong>$ <?php echo $product['price'] ?></strong>

                    <p class="card-t">
                        <?php echo substr($product['description'], 0, 50) ?>
                    </p>
                    <p class="card-text">
                        <a href="../controllers/singleProductCartController.php?id=<?php echo $product['id'] ?>" class="btn btn-primary btn-sm">
                            View
                        </a>
                    </p>
                </div>
            </div>
        </div>
    <?php
        }
    ?>
</div>