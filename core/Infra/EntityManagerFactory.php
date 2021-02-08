<?php

namespace Core\Infra;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;
use Dotenv\Dotenv;
class EntityManagerFactory
{
    public function getEntityManager(): EntityManagerInterface
    {
        $dotenv = Dotenv::createMutable(__DIR__ . '/../../');
        $dotenv->load();
        $path = [__DIR__ . '/../../app/Entity'];
        $isDevMode = $_ENV['DEV_MODE'];

        $database = array(
            'driver' => $_ENV['DATABASE_DRIVE'],
            'path' => $_ENV['DATABASE_PATH'],
            $isDevMode
        );

        $settings = Setup::createAnnotationMetadataConfiguration(
            $path,
            $isDevMode
        );

        return EntityManager::create($database, $settings);
    }
}