<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Supero - Helden</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">

<nav class="col-xs-3">
    <?php include '_navi.php' ?>
</nav>

<main class="col-xs-9">
    <h1>Supero - Helden</h1>
    <?php
    $heros = array('Batman', 'Robin', 'Flash', 'Batgirl', 'Groot', 'Joker',
        'Supergirl', 'Superman', 'Thor');
    ?>
    <table class="table table-bordered">
        <?php foreach($heros as $name) {
             // im Dateisystem besser nur Kleinbuchstaben verwenden
            $file = strtolower($name);
            echo "<tr>";
            echo "<td><a href='held.php?name=$name'>$name</a></td>";
            echo "<td><img src='img/$file.jpg' alt='$name' class='img-rounded' style='width: 200px'></td>";
            echo "</tr>";
        } ?>
    </table>
</main>

</div>
</body>
</html>
