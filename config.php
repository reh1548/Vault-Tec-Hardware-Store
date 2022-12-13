<?php

require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = '417806044441-mm1ti3dgu5c1vu20i86id7f0nugqn871.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/Vault-Tec-Hardware-Store(2)/better/controllers/loginGoogle.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// Connect to database
$hostname = "localhost";
$username = "root";
$password = "";
$database = "vault-tech hardware store";

$conn = mysqli_connect($hostname, $username, $password, $database);
