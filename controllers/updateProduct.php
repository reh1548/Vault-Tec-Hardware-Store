<?php

require_once "../models/functionsProduct.php";

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: ../public/products/index.php');
    exit;
}

/** @var $pdo \PDO */
require_once "../database.php";

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);


$title = $product['title'];
$description = $product['description'];
$price = $product['price'];
$is_featured = $product['is_featured'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../models/validate_product.php";

    if (empty($errors)) {
        $statement = $pdo->prepare("UPDATE products SET title = :title, 
                                        image = :image, 
                                        description = :description, 
                                        price = :price,
                                        is_featured = :is_featured WHERE id = :id");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':is_featured', $is_featured);
        $statement->bindValue(':id', $id);

        $statement->execute();
        header('Location: ../public/products/index.php');
    }
}

?>
<?php include_once '../views/partials/header.php' ?>
<?php include_once '../views/products/update.php'?>