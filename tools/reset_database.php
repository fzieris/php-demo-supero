<?php
// Kleines Utility um einfach die Datenbank befüllen zu können.
use Supero\Hero;

require_once __DIR__ . '/../bootstrap.php';

$heros = array(
    new Hero("Batman", "100 €/h", "ausgebucht",
            "Nachtaktiv und günstig im Doppelpack mit Robin. " .
            "Gutes Gehör für hohe Töne, singt im Heldenchor aber im Bass."),
    new Hero("Flash", "10 €/sec", "fast ausgebucht",
            "Ihr Held für eilige Einsätze. " .
            "Jetzt neu: Sekundengenaue Abrechnung für Ihren Auftrag."),
    new Hero("Robin", "50 €/h", "verfügbar",
            "Jung und dynamisch. Guter Freund von Batman. " .
            "Trägt gerne Strumpfhosen, vor allem im Winter."),
    new Hero("Batgirl"),
    new Hero("Groot"),
    new Hero("Joker"),
    new Hero("Supergirl"),
    new Hero("Superman"),
    new Hero("Thor"),
);

echo "Lösche alte Einträge ... ";
$q = $entityManager->createQuery('delete from Supero\Hero');
$oldEntries = $q->execute();
echo "OK ($oldEntries Helden gelöscht)\n";

echo "Lege frische Einträge an ... ";
$c = 0;
foreach($heros as $hero) {
    $entityManager->persist($hero);
    $c++;
}
$entityManager->flush();
echo "OK ($c Helden angelegt)\n";
