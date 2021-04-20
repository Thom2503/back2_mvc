<?php

  class Book
  {
    public $id = null;
    public $title = "";
    public $author = "";
    public $isbn = "";

    public function __construct($id = NULL)
    {
      //is er een id mee gegeven?
      if (!is_null($id))
      {
        $this->load($id);
      }
    }

    private function load($id)
    {
      global $mysql;

      //query om het boek te vinden
      $sql = "SELECT * FROM `mvc_boeken` WHERE id = {$id}";

      $result = mysqli_query($mysql, $sql);

      if (mysqli_num_rows($result) == 1)
      {
        //lees de gegevens uit
        $row = mysqli_fetch_array($result);

        //vul de properties in met de data
        $this->id = $id;
        $this->title = $row['title'];
        $this->author = $row['author'];
        $this->isbn = $row['isbn'];
      } else
      {
        //er gaat wat mis
        throw new Exception("Kan het boek met ID ". $id ." niet vinden!");
      }
    }

    public function save()
    {
      global $mysql;

      //maak de tekst schoon
      $this->title = htmlentities(html_entity_decode($this->title, ENT_QUOTES), ENT_QUOTES);
      $this->author = htmlentities(html_entity_decode($this->author, ENT_QUOTES), ENT_QUOTES);
      $this->isbn = htmlentities(html_entity_decode($this->isbn, ENT_QUOTES), ENT_QUOTES);

      if (strlen($this->title) > 0 && strlen($this->author) > 0 && strlen($this->isbn) > 0)
      {
        //controleer of dit een nieuw of bestaand boek is
        if (is_null($this->id))
        {
          $sql = "INSERT INTO `mvc_boeken`(`title`, `author`, `isbn`)
          VALUES ('$this->title','$this->author','$this->isbn')";

          $result = mysqli_query($mysql, $sql);

          if (!$result)
          {
            //er gaat wat mis
            throw new Exception("Er is iets mis gegaan probeer het later opnieuw!");
          }
        } else
        {
          $sql = "UPDATE `mvc_boeken` SET
          `title`='$this->title',`author`='$this->author',`isbn`=$this->isbn WHERE `id` = $this->id";

          $result = mysqli_query($mysql, $sql);

          if (!$result)
          {
            //er gaat wat mis
            throw new Exception("Er is iets mis gegaan probeer het later opnieuw!");
          }
        }
      }
    }
  }

 ?>
