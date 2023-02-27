<?php

class Database {
    const HOST = 'localhost';
    const USER = 'root';
    const PASSWORD = '';
    const DB = 'airlines';

    public $flights;
    public $passengers;
    public static $database;

    public function __construct() {
        try {
            self::$database = new mysqli(self::HOST, self::USER, self::PASSWORD, self::DB); 
                //echo 'Prisijungimas pavyko';
            } catch(Exception $error) {
                echo 'Prisijungimas nepavyko';
            }
    }

    public function addFlight($from, $to, $flight_number, $flight_date) {
        $this->flights = self::$database->query("INSERT INTO `flights`(`from_flight`, `to_flight`, `flight_number`, `flight_date`) VALUES ('$from', '$to', '$flight_number', '$flight_date')");
    }

    public function getFlights() {
        $this->flights = self::$database->query("SELECT * FROM flights")->fetch_all(MYSQLI_ASSOC);

        return $this;
    }

    public function addPassenger($first_name, $last_name, $flight_id) {
        $this->passengers = self::$database->query("INSERT INTO `passengers` (`first_name`, `last_name`, `flight_id`) VALUES ('$first_name', '$last_name', '$flight_id')");
    }

    public function filterDepartures($from) {
        $this->flights = self::$database->query("SELECT * FROM `flights` WHERE `from_flight` = '$from'")->fetch_all(MYSQLI_ASSOC);

        return $this;
    }

    public function filterArrivals($to) {
        $this->flights = self::$database->query("SELECT * FROM `flights` WHERE `to_flight` = '$to' ")->fetch_all(MYSQLI_ASSOC);

        return $this;
    }

    public function getPassengerInfo($flight_number) {
        $this->passengers = self::$database->query("SELECT * FROM `passengers`
                                                    INNER JOIN `flights`
                                                    ON passengers.flight_id = flights.flight_number
                                                    WHERE flights.flight_number = '$flight_number'")->fetch_all(MYSQLI_ASSOC);

        return $this;
    }

    public function getFlightInfo($first_name, $last_name) {
        $this->flights = self::$database->query("SELECT * FROM `flights`
                                                INNER JOIN `passengers`
                                                ON passengers.flight_id = flights.flight_number
                                                WHERE first_name = '$first_name' AND last_name = '$last_name'")->fetch_all(MYSQLI_ASSOC);
        
        return $this;
    }
}

echo "<pre>";

$db = new Database();

// $db->addFlight('Vilnius(VNO)', 'Kaunas(KNS)', 'AK256', '2023-03-01');
// $db->addFlight('Kaunas(KNS)', 'Vilnius(VNO)', 'AK589', '2023-05-01');

// $db->getFlights();

// var_dump($db->flights);

// $db->addPassenger('Greta', 'Staseliene', 'AK256');
// $db->addPassenger('Matvydas', 'Staselis', 'AK589');
// $db->addPassenger('Jonas', 'Jonaitis', 'AK589');

// $db->filterDepartures('Kaunas(KNS)');
// var_dump($db->flights);


// $db->filterArrivals('Kaunas(KNS)');
// var_dump($db->flights);

// $db->getPassengerInfo('AK256');
// var_dump($db->passengers);

// $db->getFlightInfo('Greta', 'Staseliene');
// var_dump($db->flights);