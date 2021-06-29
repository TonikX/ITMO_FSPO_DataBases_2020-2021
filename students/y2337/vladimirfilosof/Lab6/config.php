<?
    class dbconfig
    {
        public static $dbuser = "vladimir";
        public static $dbpass = "12345678";
        public static $host = "localhost";
        public static $dbname = "improvement_of_parks";
    }

    $tables = [
        "decorator" => array(
            "id", 
            "name", 
            "phone", 
            "address", 
            "education", 
            "educational_institution", 
            "education_type"
        ),
        "object" => array(
            "id", 
            "name", 
            "served", 
            "contract_number", 
            "contract_date"
        ),
        "decorator_objects" => array (
            "id",
            "decorator_id",
            "object_id"
        ),
        "zone" => array(
            "id",
            "object_id"
        ),
        "plants_type" => array(
            "id",
            "name"
        ),
        "watering_regime" => array(
            "id",
            "name"
        ),
        "plants" => array(
            "id",
            "plant_type",
            "zone_id",
            "planting_date",
            "age",
            "watering_regime",
            "watering_time",
            "water_amount"
        ),
        "timetable" => array(
            "id",
            "decorator_id",
            "plant_id",
            "date"
        )            
          


    ];
    
    // echo "<pre>";
    // print_r($tables);
    // echo "</pre>";
?>

