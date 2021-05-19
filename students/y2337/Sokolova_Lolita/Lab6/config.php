<?
    class dbconfig
    {
        public static $dbuser = "yotra";
        public static $dbpass = "shawermos123";
        public static $host = "localhost";
        public static $dbname = "new_motor_depot";
    }

    $tables = [
        "motor_depot" => array(
            "id", 
            "name", 
            "address"
        ),
        "garage" => array(
            "id", 
            "address", 
            "refueller_id", 
            "motor_depot_id"
        ),
        "car" => array (
            "id",
            "car_model",
            "reg_number",
            "garage_id"
        ),
        "refueller" => array(
            "id",
            "name",
            "exp"
        ),
        "driver" => array(
            "id",
            "name",
            "exp"
        ),
        "fuel" => array(
            "id",
            "fuel_name",
            "liter",
            "kilogram"
        ),
        "trip" => array(
            "id",
            "car_id",
            "driver_id",
            "fuel_id",
            "trip_date"
        ),
        "waybill" => array(
            "id",
            "point_of_loading",
            "point_of_unloading",
            "mileage_total",
            "mileage_cargo",
            "consignee",
            "order_time",
            "trip_id"
        )
    ];
?>

