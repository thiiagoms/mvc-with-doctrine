<?php include __DIR__ . '/../header.php' ?>

<form action="/store-anime" method="POST">
    <div class="form-group">
        <label for="animeName">Anime name: </label>
        <input type="text" class="form-control" name="animeName" placeholder="Enter a anime name: ">
    </div>
    <button type="submit" class="btn btn-success" name="register">Add</button>
<?php include __DIR__ . '/../footer.php' ?>