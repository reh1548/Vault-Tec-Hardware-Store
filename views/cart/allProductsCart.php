
<form>
    <div class="input-group mb-3">
        <input type="text" class="form-inline my-2 my-lg-0" placeholder="Search Product" name="search">
        <div class="input-group-append">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </div>
</form>



<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $i => $product) { ?>
            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td>
                    <?php if ($product['image']) : ?>
                        <img src="../public/<?php echo $product['image'] ?>" alt="<?php echo $product['title'] ?>" class="product-img" width="50" height="60">
                    <?php endif; ?>
                </td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['description'] ?></td>
                <td>$<?php echo $product['price'] ?></td>
                <td><a href="singleProductCartController.php?id=<?php echo $product['id'] ?>" class="btn btn-primary btn-sm">View</a></td>

            </tr>
        <?php } ?>
    </tbody>
</table>

</body>

</html>