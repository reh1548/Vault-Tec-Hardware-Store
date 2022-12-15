<?php 
/** @var $pdo \PDO */
require_once "../database.php";
$search = $_GET['search'] ?? '';
if ($search) {
    $statement = $pdo->prepare('SELECT * FROM users WHERE first_name LIKE :first_name');
    $statement->bindValue(':first_name', "%$search%");
} else {
    $statement = $pdo->prepare('SELECT id, email, first_name, last_name, verifiedEmail, token FROM users');
}

$statement->execute();
$customers = $statement->fetchAll(PDO::FETCH_ASSOC);

include_once '../views/customer.php';