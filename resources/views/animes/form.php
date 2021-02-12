<?php include __DIR__ . '/../header.php' ?>

<form action="/store-anime<?= isset($anime) ? '?id=' . $anime->getId() : '' ; ?>" method="POST">
    <div class="form-group">
        <label for="animeName">Anime name: </label>
        <input type="text" 
            id="animeName"
            name="animeName"
            class="form-control"
            value="<?= isset($anime) ? $anime->getName() : ''; ?>"
        >
    </div>
    <button type="submit" class="btn btn-success" name="register"><?php echo $button; ?></button>
<?php include __DIR__ . '/../footer.php' ?>