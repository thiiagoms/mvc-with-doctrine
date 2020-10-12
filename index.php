<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php
  error_reporting(E_ALL);
  require "./vendor/autoload.php";

  use Database\Database;

  $utils = new Database();
  $utils->open();

?>
</body>
</html>