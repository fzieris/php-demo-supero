<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <?php
    // direkter Zugriff auf $_GET['name'] ginge auch;
    // filter_input() erspart aber u.a. die Prüfung isset($_GET['name'])
    $name = filter_input(INPUT_GET, 'name');

    $heros = array(
        'Batman' => array(
            'price' => "100 €/h",
            'status' => "ausgebucht",
            'text' => "Nachtaktiv und günstig im Doppelpack mit Robin. "
                    . "Gutes Gehör für hohe Töne, singt im Heldenchor aber im Bass."),
        'Flash' => array(
            'price' => "10 €/sec",
            'status' => "fast ausgebucht",
            'text' => "Ihr Held für eilige Einsätze. "
                   . "Jetzt neu: Sekundengenaue Abrechnung für Ihren Auftrag."),
        'Robin' => array(
            'price' => "50 €/h",
            'status' => "verfügbar",
            'text' => "Jung und dynamisch. Guter Freund von Batman. "
                   . "Trägt gerne Strumpfhosen, vor allem im Winter."),
    );
    $hero = $heros[$name];

    // Bestimmen der CSS-Klasse anhand der Helden-Verfügbarkeit
    $statusClasses = array(
        'verfügbar' => 'success',
        'fast ausgebucht' => 'warning',
        'ausgebucht' => 'danger',
    );
    $class = $statusClasses[$hero['status']];
    ?>
    <title>Supero - Held <?=$name?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
</head>
<body>
<div class="container">

<nav class="col-xs-3">
    <?php include '_navi.php' ?>
</nav>

<main class="col-xs-9">
    <h1>Held <?=$name?></h1>
    <div class="row">

    <div class="col-xs-6">
        <img src="img/<?=strtolower($name)?>.jpg" alt="<?=$name?>" class="img-rounded img-responsive">
    </div>
    <div class="col-xs-6">
        <table class="table">
            <tr><th>Name</th><td><?=$name?></td></tr>
            <tr><th>Kosten</th><td><?=$hero['price']?></td></tr>
            <tr><th>Status</th><td class="<?=$class?>"><?=$hero['status']?></td></tr>
            <tr><td colspan="2"><?=$hero['text']?></td></tr>
        </table>
    </div>

    </div>
</main>

</div>
</body>
</html>
