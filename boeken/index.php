<?php
  //require de config file voor db connectie
  require "../includes/config.php";
  //get the book class
  require "models/Book.php";
  require "controllers/BookController.php";

  //maak een nieuw boek object
  $ctr = new BookController();

  //toon de boekenlijst
  $ctr->index();
 ?>
