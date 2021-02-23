<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>PHP with MVC</title>
</head>

<body>
    <?php if (isset($_SESSION['logged'])) : ?>
        <nav class="navbar navbar-dark bg-dark mb-4">
            <a href="/animes/list-animes" class="navbar-brand">Home</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a href="/user/logout" class="nav-link">Logout</a>
                </li>
            </ul>
        </nav>

    <?php endif; ?>

    <body>
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-4"><?= $title; ?></h1>
            </div>

            <?php if (isset($_SESSION['message'])) : ?>
                <div class="alert alert-<?= $_SESSION['alertClass']; ?>">
                    <?= $_SESSION['message']; ?>
                </div>
            <?php
                unset($_SESSION['message']);
                unset($_SESSION['alertClass']);
            endif;
            ?>