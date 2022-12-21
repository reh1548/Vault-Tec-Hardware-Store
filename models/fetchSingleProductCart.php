<?php

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id']))
{
    $sql = "SELECT * FROM products WHERE is_featured = :is_featured AND id = :id";
    $handle = $pdo->prepare($sql);
    $params = [
            ':is_featured'=>1,
            ':id' =>$_GET['id'],
        ];
    $handle->execute($params);
    if($handle->rowCount() == 1 )
    {
        $getProductData = $handle->fetch(PDO::FETCH_ASSOC);
    }
    else
    {
        $error = '404! No record found';
    }

    
}
else
{
    $error = '404! No record found';
}

if(isset($_POST['add_to_cart']) && $_POST['add_to_cart'] == 'add to cart')
{
    $id = intval($_POST['product_id']);
    $productQty = intval($_POST['product_qty']);
    
    $sql = "SELECT * FROM products WHERE is_featured = :is_featured AND id = :id";

    $prepare = $pdo->prepare($sql);
    $params = [
            ':is_featured'=>1,
            ':id' =>$id,
        ];
    $prepare->execute($params);
    $fetchProduct = $prepare->fetch(PDO::FETCH_ASSOC);
    $calculateTotalPrice = number_format($productQty * $fetchProduct['price'],2);
    
    $cartArray = [
        'product_id' =>$id,
        'qty' => $productQty,
        'product_name' =>$fetchProduct['title'],
        'product_price' => $fetchProduct['price'],
        'total_price' => $calculateTotalPrice,
        'product_img' =>$fetchProduct['image']
    ];
    
    if(isset($_SESSION['cart_items']) && !empty($_SESSION['cart_items']))
    {
        $ids = [];
        foreach($_SESSION['cart_items'] as $cartKey => $cartItem)
        {
            $ids[] = $cartItem['product_id'];
            if($cartItem['product_id'] == $id)
            {
                $_SESSION['cart_items'][$cartKey]['qty'] = $productQty;
                $_SESSION['cart_items'][$cartKey]['total_price'] = $calculateTotalPrice;
                break;
            }
        }

        if(!in_array($id,$ids))
        {
            $_SESSION['cart_items'][]= $cartArray;
        }

        $successMsg = true;
        
    }
    else
    {
        $_SESSION['cart_items'][]= $cartArray;
        $successMsg = true;
    }

}
$pageTitle = 'Vault-Tec Hardware Store Single Product Page';
$metaDesc = 'Demo PHP shopping cart get products from database';