<?php

use App\Entity\User;
use Core\Infra\EntityManagerFactory;

require_once __DIR__ . '/../../vendor/autoload.php';

$user = new User();
$entityManagerFactory = new EntityManagerFactory();
$entityManager = $entityManagerFactory->getEntityManager();

try {
    if (isset($argv[1]) && isset($argv[2])) {
        $user->setEmail($argv[1]);
        $user->setPassword(password_hash($argv[2], PASSWORD_DEFAULT));

        $entityManager->persist($user);

        $entityManager->flush();
        print("[*] User has been created!!");

    } else {
        print("[*] Please pass the user and password as param");
    }
} catch (Exception $e) {
    print("[*] Exception: {$e->getMessage()}");
}
