<?php include_once '../views/partials/header.php' ?>
<p style="margin-left: 20px;">
    <a href="../public/products/index.php" class="btn btn-sm btn-primary" style="margin-top: 20px; margin-left: 20px; display: inline-block;">Back to products</a>
    <a href="searchCustomer.php" type="button" class="btn btn-sm btn-primary" style="margin-top: 20px; display: inline-block;">Manage Customers</a>
    <a href="../public/index.php" type="button" class="btn btn-sm btn-danger " style="margin: 20px 0px 0px 1000px; display: inline-block;">Logout</a>
</p>
<h1 style="margin-left: 20px;">Orders Management</h1>
<form style="margin-left: 20px;">
    <div class="input-group mb-3">
        <input type="text" class="form-inline my-2 my-lg-0" placeholder="Search Product" name="search">
        <div class="input-group-append">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </div>
    </div>
</form>


<table class="table" style="margin-left: 20px; margin-right: 20px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Alt Address</th>
            <th scope="col">Country</th>
            <th scope="col">State</th>
            <th scope="col">Zipcode</th>
            <th scope="col">Total Price</th>
            <th scope="col">Order Status</th>
            <th scope="col">Placed At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $i => $customer) { ?>
            <tr>
                <th scope="row"><?php echo $i + 1 ?></th>
                <td><?php echo $customer['first_name'] ?></td>
                <td><?php echo $customer['last_name'] ?></td>
                <td><?php echo $customer['email'] ?></td>
                <td><?php echo $customer['address'] ?></td>
                <td><?php echo $customer['address2'] ?></td>
                <td><?php echo $customer['country'] ?></td>
                <td><?php echo $customer['state'] ?></td>
                <td><?php echo $customer['zipcode'] ?></td>
                <td><?php echo $customer['total_price'] ?></td>
                <td><?php echo $customer['order_status'] ?></td>
                <td><?php echo $customer['created_at'] ?></td>
                <td>
                    <form method="post" action="../controllers/deleteOrder.php" style="display: inline-block">
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