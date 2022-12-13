<?php include_once '../views/partials/header.php' ?>
<p>
    <a href="../public/products/index.php" class="btn btn-sm btn-primary" style="margin-top: 20px; display: inline-block;">Back to products</a>
</p>
<h1>Customers Management</h1>
<form>
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Search Product" name="search">
        <div class="input-group-append">
            <button class="btn-btn-outline-secondary" type="submit">Search</button>
        </div>
    </div>

</form>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Picture</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($customers as $i => $customer) { ?>
            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td>
                    <?php if ($customer['picture']) : ?>
                        <img src="../<?php echo $customer['picture'] ?>" alt="<?php echo $customer['first_name'] ?>" class="product-img">
                    <?php endif; ?>
                </td>
                <td><?php echo $customer['first_name'] ?></td>
                <td><?php echo $customer['last_name'] ?></td>
                <td><?php echo $customer['email'] ?></td>
                <td>
                    <form method="post" action="../controllers/deleteCustomer.php" style="display: inline-block">
                        <input type="hidden" name="id" value="<?php echo $customer['id'] ?>" />
                        <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>

</html>