<?php

$sql = "SELECT * FROM products WHERE is_featured = 1 ORDER BY create_date DESC";
$handle = $pdo->prepare($sql);
$handle->execute();
$getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);

$pageTitle = 'Vault-Tec Hardware Shop';
$metaDesc = 'Demo PHP shopping cart get products from database';
