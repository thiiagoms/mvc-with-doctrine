<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Entity\Anime;
use Core\Infra\EntityManagerFactory;

class AnimesController implements Controller
{
    /**
     * @var \Doctrine\ORM\EntityManagerInterface
     */
    private $_entityManager;

    public function __construct()
    {
        $this->_entityManager = (new EntityManagerFactory())->getEntityManager();
    }

    public function index(): void
    {
        $animesRepo = $this->_entityManager->getRepository(Anime::class);
        $title = "List animes";
        $animes = $animesRepo->findAll();
        require __DIR__ . '/../../../resources/views/animes/index.php';
    }

    public function create(): void
    {
        $title = "Insert anime";
        require __DIR__ . '/../../../resources/views/animes/create.php';
    }

    public function store(): void
    {
        $animeName = filter_input(INPUT_POST, "animeName", FILTER_SANITIZE_STRING);
        $anime = new Anime();
        $anime->setName($animeName);
        $this->_entityManager->persist($anime);
        $this->_entityManager->flush();

        header('Location: /list-animes', true, 302);
    }
}
