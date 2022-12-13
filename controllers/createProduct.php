<?php
/** @var $pdo \PDO */
require_once "../models/functionsProduct.php";
require_once "../database.php";

$errors = [];

$title = '';
$description = '';
$price = '';

$product = [
    'image' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require_once "../models/validate_product.php";

    if (empty($errors)) {
        $statement = $pdo->prepare("INSERT INTO products (title, image, description, price, create_date)
                VALUES (:title, :image, :description, :price, :date)");
        $statement->bindValue(':title', $title);
        $statement->bindValue(':image', $imagePath);
        $statement->bindValue(':description', $description);
        $statement->bindValue(':price', $price);
        $statement->bindValue(':date', date('Y-m-d H:i:s'));

        $statement->execute();
        header('Location: ../public/products/index.php');
    }

}


?>

<?php include_once '../views/partials/header.php' ?>
<?php include_once '../views/products/create.php'?>
