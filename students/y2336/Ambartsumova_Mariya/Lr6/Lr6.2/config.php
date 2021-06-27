<?
    class dbconfig
    {
        public static $dbuser = "postgres";
        public static $dbpass = "2511";
        public static $host = "localhost";
        public static $dbname = "lab6";
    }

    $tables = [
        "klient" => array(
            "id", 
            "passport", 
            "name",
            "arrival_city"
        ),
        "check_in" => array(
            "id", 
            "date",
            "hotel_number_id", 
            "klient_id",
            'administrator_id',
            "time"
        ),
        "hotel_number" => array (
            "id",
            "type",
            "cost",
            "floor",
            "status"
        ),
        "administrator" => array(
            "id",
            "name"
        ),
        "clean" => array(
            "id",
            "date",
            "hotel_number_id",
            "cleaner_id",
            "administrator_id",
            "time"
        ),
        "cleaner" => array(
            "id",
            "name",
            "administrator_id"
        )
    ];
?>

