<?php 
session_start();
require_once('../database.php');

require_once '../models/fetchAllProductsCart.php';

include_once '../views/partials/headerCart.php';
include_once '../views/cart/allProductsCart.php';