<?php

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = (new \Core\Infra\EntityManagerFactory())->getEntityManager();
$userRepo = $entityManager->getRepository(\App\Entity\User::class);
$users = $userRepo->findAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>List All users</title>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>List users</h1>
        </div>
        <ul class="list-group">
           <?php foreach ($users as $user): ?>
            <li class="list-group-item">
                <?= $user->getEmail(); ?>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>

</html>