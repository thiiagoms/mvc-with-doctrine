<?php

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Core\Infra\EntityManagerFactory;

require __DIR__ . '/../vendor/autoload.php';

return ConsoleRunner::createHelperSet(
   (new EntityManagerFactory())->getEntityManager()
);
