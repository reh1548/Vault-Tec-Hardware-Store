<?php
session_start();
require_once('../database.php');
require_once('../models/helpersCart.php');

if (isset($_GET['action'], $_GET['item']) && $_GET['action'] == 'remove') {
    unset($_SESSION['cart_items'][$_GET['item']]);
    header('location: cartController.php');
    exit();
}

$pageTitle = 'Vault-Tec Hardware Store - Add to cart using Session';
$metaDesc = 'Vault-Tec Hardware Store - Add to cart using Session';

include_once '../views/partials/headerCart.php';

?>

<?php include '../views/cart/cart.php'; ?>
<?php include_once '../views/partials/footerCart.php'; ?>
