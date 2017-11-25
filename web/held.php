<?php
// Gemeinsame genutzte Dinge sind dorthin ausgelagert
require_once '../bootstrap.php';

// direkter Zugriff auf $_GET['name'] ginge auch;
// filter_input() erspart aber u.a. die Prüfung isset($_GET['name'])
$name = filter_input(INPUT_GET, 'name');

// der Backslash trennt den Namespace vom Klassennamen (. in Java)
// der :: ist für Zugriffe auf statische Methode/Felder (. in Java)
$hero = Supero\Hero::getByName($name);

// Bestimmen der CSS-Klasse anhand der Helden-Verfügbarkeit
$statusClasses = array(
    '' => '',
    'verfügbar' => 'success',
    'fast ausgebucht' => 'warning',
    'ausgebucht' => 'danger',
);
// der Pfeil -> ist für Zugriffe auf normale (nicht-statische) Methoden und
// Felder (. in Java)
$class = $statusClasses[$hero->getStatus()];

// Das vorkonfigurierte Twig nutzen, um ein Template (1. Parameter) zu rendern
// und dabei genau zu bestimmen, welche Variablen verwendet werden sollen
// (2. Parameter).
echo $twig->render('held.htm.twig', array(
    'name' => $name,
    'hero' => $hero,
    'statusClass' => $class,
));
