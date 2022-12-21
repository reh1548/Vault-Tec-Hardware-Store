<?php
session_start();
require('config.php');
$token =$_POST['stripeToken'];
$input = sprintf("%.3f", $_SESSION['checkout_total_price']);
$cents = (int) ( (string) ( $input * 100 ) );

$data=\Stripe\Charge::create(array(
    "amount"=>$cents,
    "currency"=>"USD",
    "description"=>"Vault-Tec Hardware Store",
    "source"=>$token
));
// echo "<pre>";
// // echo var_dump($_SESSION);
// print_r($data);
// echo "</pre>";
// $sql = 'insert into orders (first_name, last_name, email, address, address2, country, state, zipcode, order_status, created_at, updated_at) values (:fname, :lname, :email, :address, :address2, :country, :state, :zipcode, :order_status, :created_at, :updated_at)';
//     $statement = $pdo->prepare($sql);
//     $params = [
//       'fname' => '$firstName',
//       'lname' => '$lastName',
//       'email' => 'sijan.ahmed@gmail.com',
//       'address' => '$address',
//       'address2' => '$address2',
//       'country' => '$country',
//       'state' => '$state',
//       'zipcode' => 3245,
//       'order_status' => 'confirmed',
//       'created_at' => date('Y-m-d H:i:s'),
//       'updated_at' => date('Y-m-d H:i:s')
//     ];
//     $statement->execute($params);
//     unset($_SESSION['cart_items']);
unset($_SESSION['cart_items']);
$_SESSION['confirm_order'] = true;
header('location: ../controllers/indexCartController.php');


// header('location: ../controllers/indexCartController.php');
?>


