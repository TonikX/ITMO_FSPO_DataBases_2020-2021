<?php

$db = pg_connect("host=localhost dbname=postgres user=postgres password=root");

//

if (isset($_GET["request"]))
{
    if ($_GET["request"] == "add")
    {
        $query = "INSERT INTO doctors (name, birth, class, schedule_id, price_id) VALUES (" .
            "'{$_GET["add_name"]}', " .
            "'{$_GET["add_birth"]}', " .
            "'{$_GET["add_class"]}', " .
            "{$_GET["add_schedule_id"]}, " .
            "{$_GET["add_price_id"]} " .
            ")"
            ;

        pg_query($db, $query);
        header("Location: /doctors.php");
    }
    else if ($_GET["request"] == "edit")
    {
        $query = "UPDATE doctors SET " . 
            " name=" . "'" . $_GET["edit_name"] . "'" . "," .
            " birth=" . "'" . $_GET["edit_birth"] . "'" . "," .
            " class=" . "'" . $_GET["edit_class"] . "'" . "," .
            " schedule_id=" . $_GET["edit_schedule_id"] . "," .
            " price_id=" . $_GET["edit_price_id"] .
            " WHERE id=" . $_GET["edit_id"] 
            ;

        pg_query($db, $query);
        header("Location: /doctors.php");
    }
    else if ($_GET["request"] == "remove")
    {
        $query = "DELETE FROM doctors WHERE id=" . $_GET["remove_id"];

        pg_query($db, $query);
        header("Location: /doctors.php");
    }
}

//

$doctors = [];
$doctors_raw = pg_query($db, "SELECT id, name, class, date(birth) as birth, schedule_id, price_id FROM doctors");
while ($doctor = pg_fetch_assoc($doctors_raw))
{
    $doctors[] = [
        "id" => $doctor["id"],
        "name" => $doctor["name"],
        "birth" => $doctor["birth"],
        "class" => $doctor["class"],
        "schedule_id" => $doctor["id"],
        "price_id" => $doctor["id"]
    ];
}

$schedule = [];
$schedule_raw = pg_query($db, "SELECT * FROM schedule");
while ($item = pg_fetch_assoc($schedule_raw))
{
    $schedule[] = [
        "id" => $item["id"],
        "working_days" => $item["working_days"],
    ];
}

$prices = [];
$prices_raw = pg_query($db, "SELECT * FROM prices");
while ($price = pg_fetch_assoc($prices_raw))
{
    $prices[] = [
        "id" => $price["id"],
        "price" => $price["price"],
    ];
}

//

$custom = [];
$custom_query = "select doctors.name as d_name, patients.name as p_name, date(visits.was_at) as date from visits " .
    "inner join doctors on (visits.doctor_id = doctors.id) " .
    "inner join patients on (visits.patient_id = patients.id)"
    ;
$custom_raw = pg_query($db, $custom_query);
while ($item = pg_fetch_assoc($custom_raw))
{
    $custom[] = [
        "d_name" => $item["d_name"],
        "p_name" => $item["p_name"],
        "date" => $item["date"],
    ];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Custom</h2>
    <table>
        <thead>
            <tr>
                <td>Doctor</td>
                <td>Patient</td>
                <td>Date</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($custom as $item): ?>

            <tr>
                <td><?php echo $item["d_name"]; ?></td>
                <td><?php echo $item["p_name"]; ?></td>
                <td><?php echo $item["date"]; ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Doctors</h2>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Birth</td>
                <td>Class</td>
                <td>Schedule id</td>
                <td>Price id</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($doctors as $doctor): ?>

            <tr>
                <td><?php echo $doctor["id"]; ?></td>
                <td><?php echo $doctor["name"]; ?></td>
                <td><?php echo $doctor["birth"]; ?></td>
                <td><?php echo $doctor["class"]; ?></td>
                <td><?php echo $doctor["schedule_id"]; ?></td>
                <td><?php echo $doctor["price_id"]; ?></td>
            </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <br>
    <br>

    <h2>Add</h2>
    <form>
        <input type="hidden" name="request" value="add">

        <input type="text" name="add_name" placeholder="name">
        <input type="date" name="add_birth" placeholder="birth">
        <input type="text" name="add_class" placeholder="class">
        <select name="add_schedule_id">
            <?php foreach ($schedule as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["working_days"]; ?></option>

            <?php endforeach; ?>
        </select>
        <select name="add_price_id">
            <?php foreach ($prices as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["price"]; ?></option>

            <?php endforeach; ?>
        </select>

        <button type="submit">Add</button>
    </form>

    <br>
    <br>
    <br>

    <h2>Edit</h2>
    <form>
        <input type="hidden" name="request" value="edit">
        
        <input type="text" name="edit_id" placeholder="id">
        <input type="text" name="edit_name" placeholder="name">
        <input type="date" name="edit_birth" placeholder="birth">
        <input type="text" name="edit_class" placeholder="class">
        <select name="edit_schedule_id">
            <?php foreach ($schedule as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["working_days"]; ?></option>

            <?php endforeach; ?>
        </select>
        <select name="edit_price_id">
            <?php foreach ($prices as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["price"]; ?></option>

            <?php endforeach; ?>
        </select>

        <button type="submit">Edit</button>
    </form>

    <br>
    <br>
    <br>

    <h2>Remove</h2>
    <form>
        <input type="hidden" name="request" value="remove">
        <input type="text" name="remove_id" placeholder="id">
        <button type="submit">Remove</button>
    </form>

</body>
</html>