<?php
// Gemeinsame genutzte Dinge sind dorthin ausgelagert
require_once '../bootstrap.php';

// der Backslash trennt den Namespace vom Klassennamen (. in Java)
// der :: ist für Zugriffe auf statische Methode/Felder (. in Java)
$all = Supero\Hero::getAllHeros();

// Das vorkonfigurierte Twig nutzen, um ein Template (1. Parameter) zu rendern
// und dabei genau zu bestimmen, welche Variablen verwendet werden sollen
// (2. Parameter) -- dabei brauchen wir nur die Namen der Helden, und die sind
// jeweils der Schlüssel der Einträge im Helden-Array.
echo $twig->render('helden.htm.twig', array('heros' => array_keys($all)));
