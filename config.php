<?php

// you need to install Google Clinet API library in your project directory to get the vendor/autoload.php
require_once 'vendor/autoload.php';

session_start();

// init configuration
$clientID = 'your_clientID';
$clientSecret = 'your_clientSecret';
$redirectUri = 'your_redirectUrl';

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
