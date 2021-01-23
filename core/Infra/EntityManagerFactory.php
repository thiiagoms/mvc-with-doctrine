<?php

namespace Core\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        $dotenv = \Dotenv\Dotenv::createMutable(__DIR__ . '/../../');
        $dotenv->load();
        $path = [__DIR__ . '/../../app/Entity'];
        $isDevMode = $_ENV['DEV_MODE'];

        $database = array(
            'dbname' => $_ENV['DATABASE_NAME'],
            'user' => $_ENV['DATABASE_USER'],
            'password' => $_ENV['DATABASE_PASS'],
            'host' => $_ENV['DATABASE_HOST'],
            'driver' => $_ENV['DATABASE_DRIVE'],
            $isDevMode
        );

        $settings = Setup::createAnnotationMetadataConfiguration(
            $path,
            $isDevMode
        );

        return EntityManager::create($database, $settings);
    }
}