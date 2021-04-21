<?php
  //require de config file voor db connectie
  require "../includes/config.php";
  //get the book class
  require_once "models/Book.php";
  require_once "controllers/BookController.php";

  //maak een nieuw boek object
  $ctr = new BookController();

  //toon de boekenlijst
  $ctr->index();

  //toon de lijst
  include "views/booklist.php";
 ?>
