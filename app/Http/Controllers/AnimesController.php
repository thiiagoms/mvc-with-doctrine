<?php

namespace App\Http\Controllers;

use App\Interfaces\AnimesInterface;
use App\Entity\Anime;
use Core\Infra\EntityManagerFactory;
use Helper\FlashMessageTrait;
use Helper\RenderTrait;

class AnimesController implements AnimesInterface
{

    use FlashMessageTrait, RenderTrait;

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
            'animes/index',
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

        echo $this->render('animes/form', [
            'title' => $title,
            'button' => $button
        ]);
    }

    public function store(): void
    {
        $anime = new Anime();
        $animeName = filter_input(INPUT_POST, "animeName", FILTER_SANITIZE_STRING);
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (isset($id) && (!is_null($id) || $id !== false)) {
            $animeEntity = $this->_entityManager->find(Anime::class, $id);
            $animeEntity->setName($animeName);
        
            $this->defineMessage('success', 'Animes was updated');
         
        } else {
            $anime->setName($animeName);
            $this->_entityManager->persist($anime);

            $this->defineMessage('success', 'Anime was created');
        }

        $this->_entityManager->flush();

        header('Location: /animes/list-animes', true, 302);
    }

    public function delete(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /animes/list-animes');
            return;
        }

        $anime = $this->_entityManager->getReference(Anime::class, $id);

        $this->_entityManager->remove($anime);
        $this->_entityManager->flush();

        $this->defineMessage('danger', 'Anime was deleted');

        header('Location: /animes/list-animes');
    }

    public function update(): void
    {
        $id = filter_input(
            INPUT_GET,
            'id',
            FILTER_VALIDATE_INT
        );

        if (is_null($id) || $id === false) {
            header('Location: /animes/list-animes');
            return;
        }

        $animesRepo = $this->_entityManager->getRepository(Anime::class);
        $anime = $animesRepo->find($id);
        $title = "Update anime title";
        $button = "Update";
        echo $this->render('animes/form', [
            'title' => $title,
            'anime' => $anime,
            'button' => $button
        ]);
    }
}
