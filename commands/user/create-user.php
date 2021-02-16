<?php

use App\Entity\User;
use Core\Infra\EntityManagerFactory;

require __DIR__ . '/../../vendor/autoload.php';

echo PHP_EOL . <<<EOL
    ──███▅▄▄▄▄▄▄▄▄▄
    ─██▐████████████
    ▐█▀████████████▌▌
    ▐─▀▀▀▐█▌▀▀███▀█─▌
    ▐▄───▄█───▄█▌▄█
    
    [*] create User on application via CLI!
    [*] Last update: 2021-02-16
    [*] Author: Thiago Martins AKA yassuke
EOL . PHP_EOL.PHP_EOL;

$email = readline("-> Type your email here: ");
$pass = readline("-> Tpe your password here: ");

$email = filter_var($email, FILTER_VALIDATE_EMAIL);
$password = filter_var($pass, FILTER_SANITIZE_STRING);

if (is_null($email) || $email === false) {
    print("[*] E-mail must be valid: {$email} => X" . PHP_EOL);
    return;
}

$entityManager = (new EntityManagerFactory())->getEntityManager();
$userRepo = $entityManager->getRepository(User::class);

$userEmail = $userRepo->findOneBy(['_email' => $email]);

if (is_null($userEmail)) {
    $user = new User();
    $password = password_hash($password, PASSWORD_ARGON2I);
    $user->setEmail($email);
    $user->setPassword($password);
    $entityManager->persist($user);
    $entityManager->flush();
    echo "[*] Welcome {$email}!!\n";
    return;
}

print("[*] E-mail already exists!\n");
