<?php
/** @var $pdo \PDO */
require_once "../database.php";
$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM orders WHERE first_name LIKE :first_name ORDER BY created_at DESC');
    $statement->bindValue(':first_name', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT * FROM orders ORDER BY created_at DESC');
}

$statement->execute();
$orders = $statement->fetchAll(PDO::FETCH_ASSOC);

include_once '../views/orders.php';