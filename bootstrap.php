<?php
// "use" ist wie "import" in Java; man könnte auch alternativ immer den
// kompletten Namen mit Namespace und Klassennamen hinschreiben
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// __DIR__ ist das Verzeichnis in dem diese Datei (bootstrap) liegt, dadurch
// wird hier ein absoluter Pfad drauf.
// (Bei relativen Pfaden ist sonst das Einstiegsskript der Ausgangspunkt!)
require_once __DIR__ . '/vendor/autoload.php';

// Die in der DB zu speichernden Klassen (hier: Hero) liegen im 'src'-Ordner
// und sie sind über Annotationen (mit @-Zeichen) konfiguriert
// (Alternativ: z.B. separate XML-Dateien)
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__ . '/src'));
$conn = array(
    'driver' => 'pdo_sqlite',         // Wir nutzen eine SQLite-DB,
    'path' => __DIR__ . '/db.sqlite', // und so soll sie heißen.
);
$entityManager = EntityManager::create($conn, $config);

// Twig mitteilen, dass die Templates als Dateien vorliegen (könnten sonst auch
// direkt hier definiert werden, dann wäre das ein anderer "Loader") und zwar im
// "templates"-Ordner.
// (Der liegt absichtlich außerhalb des "web"-Ordners.)
$loader = new Twig_Loader_Filesystem(__DIR__ . '/templates');
$twig = new Twig_Environment($loader);
