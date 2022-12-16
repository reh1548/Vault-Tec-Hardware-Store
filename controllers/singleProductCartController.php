<?php
session_start();
require_once('../database.php');
require_once('../models/helpersCart.php');
require_once('../models/fetchSingleProductCart.php');

include('../views/partials/headerCart.php');
?>

<?php include('../views/cart/singleProductCart.php'); ?>
<?php include('../views/partials/footerCart.php'); ?>