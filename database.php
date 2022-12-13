<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=vault-tech hardware store', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);