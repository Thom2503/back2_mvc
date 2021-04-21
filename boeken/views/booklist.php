<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Boekenlijst</title>
  </head>
  <body>
    <?php
      if (count($boeken) > 0)
      {
        ?>
          <table>
            <thead>
              <tr>
                <th>Titel</th>
                <th>Auteur</th>
                <th>ISBN</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                  foreach($boeken as $boek)
                  {
                    ?>
                      <td><?php echo $boek->title ?></td>
                      <td><?php echo $boek->author ?></td>
                      <td><?php echo $boek->isbn ?></td>
                    <?php
                  }
                 ?>
              </tr>
            </tbody>
          </table>
        <?php
      } else
      {
        echo "Er kunnen geen boeken gevonden worden.";
      }

     ?>
  </body>
</html>
