<?php
// Diese Datei ist nötig um Doctrines Kommandozeile verwenden können; sie muss
// genau so heißen, sonst wird sie von Doctrine nicht gefunden.
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once __DIR__ . '/bootstrap.php';

// Der entityManager ist in der bootstrap.php definiert. Er kennt die
// Mapping-Informationen und die Datenbank-Anbindung.
return ConsoleRunner::createHelperSet($entityManager);
