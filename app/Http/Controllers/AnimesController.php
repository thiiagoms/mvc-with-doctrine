<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\InterfaceController;
use App\Entity\Anime;
use Core\Infra\EntityManagerFactory;

class AnimesController extends Controller implements InterfaceController
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

        echo $this->render(
            'index',
            [
                'title' => $title,
                'animes' => $animes
            ]
        );
    }

    public function create(): void
    {
        $title = "Insert anime";
        $button = "Add";

        echo $this->render('form', [
            'title' => $title,
            'button' => $button
        ]);
    }

    public function store(): void
    {
        $anime = new Anime();
        $animeName = filter_input(INPUT_POST, "animeName", FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (isset($id)) {
            if (!is_null($id) || $id !== false) {
                $animeEntity = $this->_entityManager->find(Anime::class, $id);
                $animeEntity->setName($animeName);
            }
        } else {
            $anime->setName($animeName);
            $this->_entityManager->persist($anime);
        }

        $this->_entityManager->flush();

        header('Location: /list-animes', true, 302);
    }

    public function delete(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /list-animes');
            return;
        }

        $anime = $this->_entityManager->getReference(Anime::class, $id);
        $this->_entityManager->remove($anime);
        $this->_entityManager->flush();
        header('Location: /list-animes');
    }

    public function update(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /list-animes');
            return;
        }

        $animesRepo = $this->_entityManager->getRepository(Anime::class);
        $anime = $animesRepo->find($id);
        $title = "Update anime title";
        $button = "Update";
        echo $this->render('form', [
            'title' => $title,
            'anime' => $anime,
            'button' => $button
        ]);
    }
}
