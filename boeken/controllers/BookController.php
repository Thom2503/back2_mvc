<?php
  /**
   *
   */
  class BookController
  {
    public function index()
    {
      global $mysql;

      //query
      $sql = "SELECT * FROM mvc_boeken ORDER BY id ASC";

      //resultaat
      $result = mysqli_query($mysql, $sql);

      //zijn er rijen gevonden?
      if (mysqli_num_rows($result) > 0)
      {
        //maak een array voor de boeken
        $boeken = Array();

        //voeg alle boeken toe aan de array
        while ($row = mysqli_fetch_array($result))
        {
          $boek = new Book($row['id']);
          //var_dump($boek);
          array_push($boeken, $boek);
        }

        //return de lijst
        return $boeken;
      } else
      {
        return false;
      }
    }
  }


 ?>
