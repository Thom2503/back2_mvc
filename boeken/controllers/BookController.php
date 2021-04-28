<?php
  /**
   * @boeken = (array)
   */
  class BookController
  {
    public function index()
    {
      global $mysql;

      $sql = "SELECT * FROM mvc_boeken ORDER BY id ASC";

      //resultaat
      $result = mysqli_query($mysql, $sql);

      //zijn er rijen gevonden?
      if (mysqli_num_rows($result) > 0)
      {
        //maak een array voor de boeken
        $boeken = [];

        //voeg alle boeken toe aan de array
        while ($row = mysqli_fetch_array($result))
        {
          $boeken[] = new Book($row['id']);
        }
        //toon de lijst
        include "views/booklist.php";
        //return de lijst
        return $boeken;
      } else
      {
        return false;
      }
    }
  }


 ?>
