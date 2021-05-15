<?php
    class dbconfig
    {
        public static $dbuser = "postgres";
        public static $dbpass = "1234";
        public static $host = "localhost";
        public static $dbname = "Aeroport";
    }

    $tables = [
        "AirCarrier" => array(
            "idaircarrier", 
            "name", 
            "workers"
        ),
        "Plane" => array(
            "idplane", 
            "stamp", 
            "places", 
            "type",
            "speed",
            "aircarrier_idaircarrier"
        ),
        "Trip" => array (
            "idtrip",
            "pointdeparture",
            "destination",
            "date_departure",
            "date_destination",
            "distance",
            "tickets_sold"
        ),
        "Transit_landings" => array(
            "idtransit_landings",
            "point_landings",
            "date_landings"
        ),
        "Member" => array(
            "idmember",
            "name",
            "age",
            "role",
            "age_experience"
        ),
        "Crew" => array(
            "idcrew",
            "staff",
            "member_idmember"
        ),
        "Fly" => array(
            "plane_idplane",
            "trip_idtrip",
            "route",
            "transit_landings_idtransit_landings",
            "crew_idcrew"
        )
    ];
?>