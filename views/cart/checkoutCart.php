
<div class="row mt-3">
  <div class="col-md-4 order-md-2 mb-4">
    <h4 class="d-flex justify-content-between align-items-center mb-3">
      <span class="text-muted">Your cart</span>
      <span class="badge badge-secondary badge-pill"><?php echo $cartItemCount; ?></span>
    </h4>
    <ul class="list-group mb-3">
      <?php
      $total = 0;
      $totalCounter = 0;



      // $totalCounter = 0;
      // $itemCounter = 0;
      // foreach($_SESSION['cart_items'] as $key => $item){                    
      // $total = $item['product_price'] * $item['qty'];
      // $totalCounter+= $total;
      // $itemCounter+=$item['qty'];
      // }



      foreach ($_SESSION['cart_items'] as $cartItem) {
        // $total += intval($cartItem['total_price']);
        $total = $cartItem['product_price'] * $cartItem['qty'];
        $totalCounter += $total;

      ?>
        <li class="list-group-item d-flex justify-content-between lh-condensed">
          <div>
            <h6 class="my-0"><?php echo $cartItem['product_name'] ?></h6>
            <small class="text-muted">Quantity: <?php echo $cartItem['qty'] ?> X Price: <?php echo $cartItem['product_price'] ?></small>
          </div>
          <span class="text-muted">$<?php echo $cartItem['total_price'] ?></span>
        </li>
      <?php
      }
      ?>

      <li class="list-group-item d-flex justify-content-between">
        <span>Total (USD)</span>
        <strong>$<?php echo number_format($totalCounter, 2); ?></strong>
      </li>
    </ul>
  </div>
  <div class="col-md-8 order-md-1">
    <h4 class="mb-3">Billing address</h4>
    <?php
    if (isset($errorMsg) && count($errorMsg) > 0) {
      foreach ($errorMsg as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
      }
    }
    ?>
    <form class="needs-validation" method="POST">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="firstName">First name</label>
          <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" value="<?php echo $_SESSION['firstN'] ?>">
        </div>
        <div class="col-md-6 mb-3">
          <label for="lastName">Last name</label>
          <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" value="<?php echo $_SESSION['lastN'] ?>">
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email</label>
        <input type="" class="form-control" id="email" name="email" placeholder="<?php echo $_SESSION['emaiL'] ?>" value="">
      </div>

      <div class="mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue : '' ?>">
      </div>

      <div class="mb-3">
        <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
        <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="<?php echo (isset($address2Value) && !empty($address2Value)) ? $address2Value : '' ?>">
      </div>

      <div class="row">
        <div class="col-md-5 mb-3">
          <label for="country">Country</label>
          <select class="custom-select d-block w-100" name="country" id="country">
            <option value="">Choose...</option>
            <option value="United States">United States</option>
            <option value="India">India</option>
            <option value="Bangladesh">Bangladesh</option>
            <option value="UK">UK</option>
          </select>
        </div>
        <div class="col-md-4 mb-3">
          <label for="state">State</label>
          <select class="custom-select d-block w-100" name="state" id="state">
            <option value="">Choose...</option>
            <option value="California">California</option>
            <option value="Texas">Texas</option>
            <option value="Chennai">Chennai</option>
            <option value="Hyderabad">Hyderabad</option>
            <option value="Dhaka">Dhaka</option>
            <option value="London">London</option>
            <option value="Welsh">Welsh</option>
          </select>
        </div>
        <div class="col-md-3 mb-3">
          <label for="zip">Zip</label>
          <input type="text" class="form-control" id="zip" name="zipcode" placeholder="" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue : '' ?>">
        </div>
      </div>
      <hr class="mb-4">

      <h4 class="mb-3">Payment</h4>

      <!-- <div class="d-block my-3">
        <div class="custom-control custom-radio">
          <input id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input" checked="">
          <label class="custom-control-label" for="cashOnDelivery">Cash on Delivery</label>
        </div>
      </div> -->

      <hr class="mb-4">
      <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="submit">Cash on Delivery</button>
      <button class="btn btn-danger btn-lg btn-block" type="submit" name="card" value="card">Pay With Card</button>
      <!-- <a href="../stripe/index.php" class="btn btn-danger btn-lg btn-block" type="submit" name="card" value="card">Pay With Card</a> -->


    </form>
  </div>
</div>