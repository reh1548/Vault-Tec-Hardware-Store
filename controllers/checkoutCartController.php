<?php
session_start();

if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
  header('location: indexCartController.php');
  exit();
}

require_once('../database.php');
require_once('../models/helpersCart.php');
$cartItemCount = count($_SESSION['cart_items']);

//pre($_SESSION);

if (isset($_POST['submit'])) {

    require_once '../models/validatecheckoutCart.php';

}


$pageTitle = 'Vault-Tec Hardware Store checkout page with Validation';
$metaDesc = 'Vault-Tec Hardware Store checkout page with Validation';

include('../views/partials/headerCart.php');
?>
<?php include('../views/cart/checkoutCart.php');?>

<?php include('../views/partials/footerCart.php'); ?>