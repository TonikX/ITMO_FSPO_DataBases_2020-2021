<?php
    class dbconfig
    {
        public static $dbuser = "postgres";
        public static $dbpass = "admin";
        public static $host = "localhost";
        public static $dbname = "lab6";
    }

    $tables = [
        "client" => array(
            "id_client", 
            "full_name", 
            "passport_id", 
            "city"
        ),
        "room" => array(
            "id_room", 
            "floor", 
            "coat_of_living", 
            "room_type"
        ),
        "Inhabitation" => array (
            "id_inhabitation",
            "accomodations",
            "check_in_date",
            "check_out_date",
            "client_id",
            "room_id"
        ),
        "administration" => array(
            "id_admin",
            "full_name",
            "contact_details",
            "experience"
        ),
        "cleaning" => array(
            "id_cleaning",
            "cleaning_floor",
            "cleaning_day",
            "admin_id",
            "employee_id"
        ),
        "employee" => array(
            "id_employee",
            "full_name",
            "post"
        ),
        "employment_contract" => array(
            "id_contract",
            "terms_of_an_agreement",
            "hiring_date",
            "admin_id",
            "employee_id"
        )
    ];
?>

