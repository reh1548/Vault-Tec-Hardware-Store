<?php

require_once "../database.php";

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: ../views/customer.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM users WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: searchCustomer.php');