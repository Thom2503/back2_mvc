<?php
  //require de config file voor db connectie
  require "../includes/config.php";
  //stel de root mapjes in en directory seperator
  define("ROOT", dirname("__FILE__"));
  define("DS", DIRECTORY_SEPARATOR);
  //get the book class
  // require "models/Book.php";
  // require "controllers/BookController.php";
  spl_autoload_register(function ($class)
  {
    //check of de class bestaat in de controllers map
    if(file_exists(ROOT . DS . "controllers" . DS . $class . ".php"))
    {
      include ROOT . DS . "controllers" . DS . $class . ".php";
    }

    //check of de class bestaat in de models map
    if(file_exists(ROOT . DS . "models" . DS . $class . ".php"))
    {
      include ROOT . DS . "models" . DS . $class . ".php";
    }
  });
  //maak een nieuw boek object
  $ctr = new BookController();

  if(isset($_GET['book']))
  {
    //toon de gevraagde boek
    $ctr->showBook($_GET['book']);
  } else
  {
    //toon de boekenlijst
    $ctr->index();
  }
 ?>
