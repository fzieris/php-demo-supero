<?php
// Gemeinsame genutzte Dinge sind dorthin ausgelagert
require_once '../bootstrap.php';

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

// Das vorkonfigurierte Twig nutzen, um ein Template (1. Parameter) zu rendern
// und dabei genau zu bestimmen, welche Variablen verwendet werden sollen
// (2. Parameter).
echo $twig->render('held.htm.twig', array(
    'name' => $name,
    'hero' => $hero,
    'statusClass' => $class,
));
