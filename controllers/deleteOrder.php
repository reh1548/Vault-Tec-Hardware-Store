<?php

require_once "../database.php";

$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: ../views/orders.php');
    exit;
}

$statement = $pdo->prepare('DELETE FROM stripe_test WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();

header('Location: searchOrder.php');
