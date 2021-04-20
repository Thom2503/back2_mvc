<?php
  require "../includes/config.php";
  //get the book class
  require "models/Book.php";

  //is zelf gemaakte boek
  $b = new Book();
  $b->title = "1984";
  $b->author = "George Orwell";
  $b->isbn = "9780141036144";

  echo $b->title." is de Titel <br>".$b->author." is de Author <br>".$b->isbn." is de isbn <br>";

  //is een boek al uit de database
  $b2 = new Book(2);

  echo $b2->title." is de Titel <br>".$b2->author." is de Author <br>".$b2->isbn." is de isbn <br>";
  $b->save();
 ?>
