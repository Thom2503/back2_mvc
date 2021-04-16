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
        $this->author = $row['author'];;
        $this->isbn = $row['isbn'];;
      } else
      {
        //er gaat wat mis
        throw new Exception("Kan het boek met ID ". $id ." niet vinden!");
      }
    }
  }

 ?>
