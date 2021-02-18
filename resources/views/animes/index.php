<?php include __DIR__ . '/../header.php' ?>

<a href="/animes/create-anime" class="btn btn-primary mb-2">Add Anime</a>

<ul class="list-group">
    <?php foreach ($animes as $anime) : ?>
        <li class="list-group-item d-flex justify-content-between">
            <?= $anime->getName(); ?>
            <span>
                <a href="/animes/update-anime?id=<?= $anime->getId(); ?>" class="href btn btn-info btn-sm">Update</a>
                <a href="/animes/delete-anime?id=<?= $anime->getId(); ?>" class="href btn btn-danger btn-sm">Delete</a>
            </span>
        </li>
    <?php endforeach; ?>
</ul>
<?php include __DIR__ . '/../footer.php' ?>