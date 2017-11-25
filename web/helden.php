<?php
// Gemeinsame genutzte Dinge sind dorthin ausgelagert
require_once '../bootstrap.php';

// der Backslash trennt den Namespace vom Klassennamen (. in Java)
$all = $entityManager->getRepository('Supero\Hero')->findAll();

// Das vorkonfigurierte Twig nutzen, um ein Template (1. Parameter) zu rendern
// und dabei genau zu bestimmen, welche Variablen verwendet werden sollen
// (2. Parameter).
echo $twig->render('helden.htm.twig', array('heros' => $all));
