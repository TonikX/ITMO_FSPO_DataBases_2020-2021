<?
    class dbconfig
    {
        public static $dbuser = "postgres";
        public static $dbpass = "260202";
        public static $host = "localhost";
        public static $dbname = "newspapers_service";
    }

    $tables = [
        "newspaper" => array(
            "id", 
            "name", 
            "price",
            "full_name_editor",
            "publication_index"
        ),
        "circulation" => array(
            "id", 
            "quantity", 
            "newspaper_id"
        ),
        "production" => array (
            "id",
            "circulation_id",
            "newspaper_id",
            "typography_id",
            "quantity"
        ),
        "typography" => array(
            "id",
            "name",
            "address",
            "work_status"
        ),
        "storage" => array(
            "id",
            "newspaper_id",
            "circulation_id",
            "typography_id",
            "production_id",
            "postoffice_id",
            "quantity"
        ),
        "postoffice" => array(
            "id",
            "address",
            "number"
        )
    ];
?>

