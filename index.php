<?php

  require "./vendor/autoload.php";

  use Core\SettingsControllerMethod as HomeSettings;

  $app = new HomeSettings();

  $app->run();
?>
