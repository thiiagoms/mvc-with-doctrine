<?php include __DIR__ . '/../header.php' ?>

<form action="/user/auth-login" method="post">
    <div class="form-group">
        <label for="userEmail">E-mail: </label>
        <input type="email" class="form-control" name="userEmail" id="userEmail" placeholder="Enter e-mail">
    </div>
    <div class="form-group">
        <label for="userPassword">Password: </label>
        <input type="password" class="form-control" name="userPassword" id="userPassword" placeholder="Password here">
    </div>
    <button class="btn btn-primary">Login</button>
</form>

<?php include __DIR__ . '/../footer.php' ?>