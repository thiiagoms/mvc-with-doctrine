<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>CRUD - MVC with php</title>
</head>

<body>
    <ul>
        <?php foreach ($this->data['response'] as $dataUser) : ?>
            <li><?php echo $dataUser['name']; ?></li>
            <li><?php echo $dataUser['email']; ?></li>
        <?php endforeach; ?>
    </ul>

</body>

</html>