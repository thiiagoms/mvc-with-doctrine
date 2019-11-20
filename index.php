<?php
 session_start();
  require_once("config".DIRECTORY_SEPARATOR."crud.php");
  $crud = new CRUD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/custom/custom.css">
    <title>CRUD - APP</title>
</head>
<body>
    <div class="container">
      <div class="center">
        <h1>CRUD - Simple application</h1>
        <hr/>
      </div>
        <form action="" method="post">
          <?php 
            if(isset($_GET['update'])) {
              $id = $_GET['update'];
              $crud->setValues("'$id'");
              foreach ($crud->readUser() as $row) {
          ?>
           <div class="form-group">
            <label for="nameInput">Old Username: </label>
            <input type="text" name="nameInput" class="form-control" id="nameInput" aria-describedby="userHelp" placeholder="<?php echo $row['user_name']; ?>">
            <small id="userHelp" class="form-text text-muted">Min: 6 characters and Max: 15 characters</small>
          </div>
          <div class="form-group">
            <label for="emailInput">Old E-mail: </label>
            <input type="email" name="emailInput" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="<?php echo $row['user_email']; ?>">
            <small id="emailHelp" class="form-text text-muted">Valid e-mail: name@example.com</small>
          </div>
          <button type="submit" name="update" class="btn btn-primary">Update</button>
          <button class="btn btn-danger">Cancel</button>
          <?php 
            } // Endforeach 
            $username = filter_input(INPUT_POST, 'nameInput', FILTER_SANITIZE_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'emailInput', FILTER_SANITIZE_SPECIAL_CHARS);
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $crud->setFields("user_name='$username', user_email='$email'");
              if ($crud->update() == 1) {  
          ?>
          <div class="alert alert-success" role="alert">
            Update Successfull! <a href='index.php' class='btn-back'>Back do home!</a>
          </div>
          <?php
            } // Update register success
            else {  // update faield
          ?> 
          <div class="alert alert-danger" role="alert">
           Update failed! <a href='index.php' class='btn-back'>Try again!</a>
          </div>
          <?php 
            } // endf of update failed
          } // Invalid email
          ?> 
         <!-- ./update form -->
         <?php
          } // Get id
          else { 
        ?>
         <div class="form-group">
            <label for="nameInput">Username: </label>
            <input type="text" name="nameInput" class="form-control" id="nameInput" aria-describedby="userHelp" placeholder="Enter your username: ">
            <small id="userHelp" class="form-text text-muted">Min: 6 characters and Max: 15 characters</small>
          </div>
          <div class="form-group">
            <label for="emailInput">Email: </label>
            <input type="email" name="emailInput" class="form-control" id="emailInput" aria-describedby="emailHelp" placeholder="Enter your e-mail: ">
            <small id="emailHelp" class="form-text text-muted">Valid e-mail: name@example.com</small>
          </div>
          <button type="submit" name="submit" class="btn btn-success">Register</button>
          <button class="btn btn-danger">Cancel</button>
          <?php 
            } // So it's a register action
            if(isset($_POST['submit'])):
              // Clean SQL injection and another type attacks
              $username = filter_input(INPUT_POST, 'nameInput', FILTER_SANITIZE_SPECIAL_CHARS);
              $email = filter_input(INPUT_POST, 'emailInput', FILTER_SANITIZE_SPECIAL_CHARS);
              if(!filter_var($email, FILTER_VALIDATE_EMAIL)):
                echo "Invalid e-mail";
              else:
                $crud->setFields("user_name, user_email");
                $crud->setValues("'$username', '$email'");
                if ($crud->create() == 1): 
          ?>
          <div class="alert alert-success" role="alert">
             Successfull! <a href='index.php' class='btn-back'>Back do home!</a>
            </div>
          <?php else: ?>
            <div class="alert alert-danger" role="alert">
             Fail! <a href='index.php' class='btn-back'>Try again!</a>
            </div>
          <?php     
              endif;
            endif;
          endif;
          ?>
  
        </form>
    <br/>
    <table class="table">
    <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Username</th>
      <th scope="col">E-mail</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      <?php 
       foreach ($crud->read() as $row):
      ?>
      <tr>
      <th scope="row"><?php echo $row["id"]; ?></th>
      <td><?php echo $row['user_name']; ?></td>
      <td><?php echo $row['user_email']; ?></td>
      <td>
        <a href="index.php?update=<?php echo $row['id']; ?>"><button class="btn btn-primary">Update</button></a>
        <a href="index.php?delete=<?php echo $row['id']; ?>"><button class="btn btn-danger">Delete</button></a> 
      </td>
      </tr>
    <?php endforeach; ?>
    <?php 
      if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        echo $id;
        $crud->setValues("'$id'");
        if($crud->deleteUser() == 1) {
    ?>
    <div class="alert alert-success" role="alert">
      Delete Successfull! <a href='index.php' class='btn-back'>Back do home!</a>
    </div>
    <?php } else { ?>
    <div class="alert alert-danger" role="alert">
      Failed to delete! <a href='index.php' class='btn-back'>Back do home!</a>
    </div>
   <?php } } ?>
  </tbody>
</table>
    </div>
   <script src="assets/js/bootstrap.min.js"></script>
</body>
</html>