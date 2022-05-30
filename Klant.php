<?php

<?php
/*
 * CRUD voor de klant
 * Maken, Lezen, Updaten, Deleten
 */
include_once "DatabaseConnect.php";

class Klant
    {
    public $naam, $adres, $postcode, $woonplaats;
    private $ID, $database, $exists;
    function __construct($database){
        $this->database = $database;
        $this->exists = false;
    }

    function Update()
    {
        if(!$this->exists)
        {
            return "Klant not in database yet";
        }
        $this->database->SQLCommando("UPDATE klant SET 
        postcode = :postcode, adres = :adres, woonplaats = :woonplaats, naam = :naam
        WHERE id = :idplaceholder", [
            "naam" => $this->naam,
            "postcode" => $this->postcode,
            "adres" => $this->adres,
            "woonplaats" => $this->woonplaats,
            "idplaceholder" => $this->ID
        ]);

        return "Update succesfull";
    }

    function Read($ID)
    {
        $data =
            $this->database->SQLCommando("SELECT * FROM klant WHERE id = :placeholder",
                ["placeholder" => $ID]);

        if(count($data) == 0)
        {
            return "Not found";
        }

        $klantdata = $data[0];
        $this->naam = $klantdata["naam"];
        $this->woonplaats = $klantdata["woonplaats"];
        $this->adres = $klantdata["adres"];
        $this->postcode = $klantdata["postcode"];
        $this->ID = $ID;
        $this->exists = true;
        return "Found";
    }
}