<?php

if (isset($_SESSION['firstN'], $_SESSION['lastN'], $_SESSION['emaiL'], $_POST['address'], $_POST['country'], $_POST['state'], $_POST['zipcode']) && !empty($_POST['address']) && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['zipcode'])) {
  $firstName = $_SESSION['firstN'];


  if (filter_var($_SESSION['emaiL'], FILTER_VALIDATE_EMAIL) == false) {
    $errorMsg[] = 'Please enter valid email address';
  } else {
    //validate_input is a custom function
    //you can find it in helpersCart.php file
    $firstName  = $_SESSION['firstN'];
    $lastName   = $_SESSION['lastN'];
    $email      = $_SESSION['emaiL'];
    $address    = validate_input($_POST['address']);
    $address2   = (!empty($_POST['address']) ? validate_input($_POST['address']) : '');
    $country    = validate_input($_POST['country']);
    $state      = validate_input($_POST['state']);
    $zipcode    = validate_input($_POST['zipcode']);

    
    $sql = 'insert into stripe_test (first_name, last_name, email, address, address2, country, state, zipcode, total_price, order_status, created_at, updated_at) values (:fname, :lname, :email, :address, :address2, :country, :state, :zipcode, :total_price, :order_status, :created_at, :updated_at)';
    $statement = $pdo->prepare($sql);
    $params = [
      'fname' => $firstName,
      'lname' => $lastName,
      'email' => $email,
      'address' => $address,
      'address2' => $address2,
      'country' => $country,
      'state' => $state,
      'zipcode' => $zipcode,
      'total_price' => $_SESSION['checkout_total_price'],
      'order_status' => 'confirmed',
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s')
    ];
    $statement->execute($params);
    if ($statement->rowCount() == 1) {

      $getOrderID = $pdo->lastInsertId();

      if (isset($_SESSION['cart_items']) || !empty($_SESSION['cart_items'])) {
        $sqlDetails = 'insert into detail_order (order_id, product_id, product_name, product_price, qty, total_price) values(:order_id, :product_id, :product_name, :product_price, :qty, :total_price)';
        $orderDetailStmt = $pdo->prepare($sqlDetails);

        $totalPrice = 0;
        foreach ($_SESSION['cart_items'] as $item) {
          $totalPrice += $item['total_price'];

          $paramOrderDetails = [
            'order_id' =>  $getOrderID,
            'product_id' =>  $item['product_id'],
            'product_name' =>  $item['product_name'],
            'product_price' =>  $item['product_price'],
            'qty' =>  $item['qty'],
            'total_price' =>  $item['total_price']
          ];

          $orderDetailStmt->execute($paramOrderDetails);
        }

        $updateSql = 'update stripe_test set total_price = :total where id = :id';

        $rs = $pdo->prepare($updateSql);
        $prepareUpdate = [
          'total' => $totalPrice,
          'id' => $getOrderID
        ];

        $rs->execute($prepareUpdate);
        if (isset($_POST['card'])) {
          header('location:../stripe/index.php');
        } else {
          unset($_SESSION['cart_items']);
          $_SESSION['confirm_order'] = true;
          header('location: indexCartController.php');
          exit();
        }
      }
    } else {
      $errorMsg[] = 'Unable to save your order. Please try again';
    }
  }
} else {
  $errorMsg = [];

  if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
    $errorMsg[] = 'First name is required';
  } else {
    $fnameValue = $_POST['first_name'];
  }

  if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
    $errorMsg[] = 'Last name is required';
  } else {
    $lnameValue = $_POST['last_name'];
  }

  if (!isset($_POST['email']) || empty($_POST['email'])) {
    $errorMsg[] = 'Email is required';
  } else {
    $emailValue = $_POST['email'];
  }

  if (!isset($_POST['address']) || empty($_POST['address'])) {
    $errorMsg[] = 'Address is required';
  } else {
    $addressValue = $_POST['address'];
  }

  if (!isset($_POST['country']) || empty($_POST['country'])) {
    $errorMsg[] = 'Country is required';
  } else {
    $countryValue = $_POST['country'];
  }

  if (!isset($_POST['state']) || empty($_POST['state'])) {
    $errorMsg[] = 'State is required';
  } else {
    $stateValue = $_POST['state'];
  }

  if (!isset($_POST['zipcode']) || empty($_POST['zipcode'])) {
    $errorMsg[] = 'Zipcode is required';
  } else {
    $zipCodeValue = $_POST['zipcode'];
  }


  if (isset($_POST['address2']) || !empty($_POST['address2'])) {
    $address2Value = $_POST['address2'];
  }
}
