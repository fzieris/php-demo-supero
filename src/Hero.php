<?php

// Namensräume sind ab PHP 5.3 verfügbar und die Verwendung wird empfohlen;
// sie sind vergleichbar mit Java Packages.
namespace Supero;

/**
 * @Entity
 */
class Hero {
    /** @Id @Column(type="integer") @GeneratedValue */
    private $id;
    /** @Column(type="string") **/
    private $name;
    /** @Column(type="string") **/
    private $price;
    /** @Column(type="string") **/
    private $status;
    /** @Column(type="string") **/
    private $text;

    // Methoden mit __ im Namen sind sog. magische Methoden; sie werden nicht
    // direkt aufgerufen. Der Konstruktur einer Klasse heißt immer __construct.
    public function __construct($name, $price = "20 €/h", $status = "verfügbar",
            $text = null) {
        // Wenn $price, $status oder $text beim Methodenaufruf nicht gesetzt
        // sind, werden die in der Signatur angegebenen Standardwerte benutzt.

        // Achtung: Der Feldzugriff erfolgt nicht mit $this->$name, weil dann
        // der *Wert* von $name entscheidend wäre: ist $name = "Batman", würde
        // dann auf $this->Batman zugegriffen werden!
        $this->name = $name;
        $this->price = $price;
        $this->status = $status;

        // Das doppelte ? umgeht eine aufwändigere Null-Abfrage:
        // Wenn $text = null ist, dann der angegebene Default-Wert genutzt,
        // ansonsten wird einfach der Wert von $text verwendet.
        $this->text = $text ?? "Buchen Sie $name noch heute.";
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getPrice() {
        return $this->price;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function getText() {
        return $this->text;
    }

    public function setText($text) {
        $this->text = $text;
    }

    public static function getAllHeros() {
        return array(
            'Batman' => new Hero("Batman", "100 €/h", "ausgebucht",
                    "Nachtaktiv und günstig im Doppelpack mit Robin. " .
                    "Gutes Gehör für hohe Töne, singt im Heldenchor aber im Bass."),
            'Flash' => new Hero("Flash", "10 €/sec", "fast ausgebucht",
                    "Ihr Held für eilige Einsätze. " .
                    "Jetzt neu: Sekundengenaue Abrechnung für Ihren Auftrag."),
            'Robin' => new Hero("Robin", "50 €/h", "verfügbar",
                    "Jung und dynamisch. Guter Freund von Batman. " .
                    "Trägt gerne Strumpfhosen, vor allem im Winter."),
            'Batgirl' => new Hero("Batgirl"),
            'Groot' => new Hero("Groot"),
            'Joker' => new Hero("Joker"),
            'Supergirl' => new Hero("Supergirl"),
            'Superman' => new Hero("Superman"),
            'Thor' => new Hero("Thor"),
        );
    }

    public static function getByName($name) {
        return self::getAllHeros()[$name];
    }
}
