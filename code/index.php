<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Nick's Picks: Albums</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,900" rel="stylesheet">
    <link rel="stylesheet" href="/css/css.css">
  </head>
  <body>

    <header>

      <?php

      echo "<h1>Nick's Picks</h1>";
      echo "<h2>Top 10 Albums</h2>";

      ?>

    </header>

    <main>
    <?php

      $host = '172.25.0.2';
      $database = 'week03';
      $user = 'idm6630';
      $pass = 'idm6630';

      try {

        $conn = new PDO("mysql:host=$host;dbname=$database", $user, $pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //echo 'Connection Established';

      } catch(PDOException $e) {

          echo 'Connection Failed: ' . $e->getMessage();

      }


      $query = 'SELECT * FROM albums';

      foreach ($conn->query($query) as $album) {
        echo "<div>";
        echo "<h3>" . $album['ID'] . "</h3>";
        echo "<h4>" . $album['artist'] . "</h4>";
        echo "<h5>" . $album['title'] . "</h5>";
        echo "<h6>" . $album['year'] . "</h6>";
        echo "<img src='" . $album['cover'] . "'>";
        echo "</div>";
      };

    ?>
    </main>

    <footer>
      <a href="#">Back to Top</a>
    </footer>
  </body>
</html>
