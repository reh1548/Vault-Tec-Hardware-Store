<?php
require_once '../config.php';

if (isset($_SESSION['user_token'])) {
  header("Location: ../controllers/loginGoogle.php");
} else {
  echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
}
