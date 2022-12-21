<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once('../database.php');
require_once('../models/helpersCart.php');
require_once '../models/fetchindexProductCart.php';

include_once '../views/partials/headerCart.php';
include_once '../views/cart/indexCart.php';
include_once '../views/partials/footerCart.php'; ?>
