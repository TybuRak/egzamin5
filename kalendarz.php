<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styl5.css">
    <title>Mój kalendarz</title>
</head>
<body>

<aside>
    <img src="logo1.png" alt="Mój kalendarz">
</aside>

<header>
    <h1>KALENDARZ</h1>
    <?php
    $conn = mysqli_connect('localhost','root','','egzamin5');

    $query = mysqli_query($conn, 'SELECT `miesiac`, `rok` FROM `zadania` WHERE `dataZadania` = \'2020-07-01\'');

    while($row = mysqli_fetch_array($query)){
        echo "<h3>" . "miesiąc: " . $row["miesiac"] . ", rok: " . $row["rok"] . "</h3>";
    }

    ?>
</header>

<main>
    <?php

    $query = mysqli_query($conn, 'SELECT `dataZadania`, `wpis` FROM `zadania` WHERE `miesiac` = \'lipiec\'');

    while($row = mysqli_fetch_array($query)){
        echo '<div class="calendar-element"><h5>' . $row["dataZadania"] . "</h5><p>" . $row["wpis"] . "</p></div>";
    }
    ?>
</main>

<footer>
    <form action="kalendarz.php" method="post">
        <label for="wpis">dodaj wpis:</label>
        <input type="text" name="wpis">
        <input type="submit" value="DODAJ">
    </form>
    <?php

    if(array_key_exists("wpis", $_POST)){
        $query = mysqli_query($conn, 'UPDATE `zadania` SET `wpis` = \'' . $_POST["wpis"] . '\' WHERE `dataZadania` = \'2020-07-13\'');
    }

    mysqli_close($conn);
    ?>
    <p>Stronę wykonał: 00000000000</p>
</footer>

</body>
</html>