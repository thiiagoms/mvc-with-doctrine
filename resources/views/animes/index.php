<?php include __DIR__ . '/../header.php' ?>

<a href="/create-anime" class="btn btn-primary mb-2">Add Anime</a>

<ul class="list-group">
    <?php foreach ($animes as $anime) : ?>
        <li class="list-group-item">
            <?= $anime->getName(); ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php include __DIR__ . '/../footer.php' ?>
