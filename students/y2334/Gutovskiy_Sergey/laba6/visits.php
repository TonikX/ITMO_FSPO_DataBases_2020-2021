<?php

$db = pg_connect("host=localhost dbname=postgres user=postgres password=root");

//

if (isset($_GET["request"]))
{
    if ($_GET["request"] == "add")
    {
        $query = "INSERT INTO visits (was_at, price, doctor_id, patient_id, hospital_id) VALUES (" .
            "'{$_GET["add_was_at"]}', " .
            "'{$_GET["add_price"]}', " .
            "'{$_GET["add_doctor_id"]}', " .
            "{$_GET["add_patient_id"]}, " .
            "{$_GET["add_hospital_id"]} " .
            ")"
            ;

        pg_query($db, $query);
        header("Location: /visits.php");
    }
    else if ($_GET["request"] == "edit")
    {
        $query = "UPDATE visits SET " . 
            " was_at=" . "'" . $_GET["edit_was_at"] . "'" . "," .
            " price=" . "'" . $_GET["edit_price"] . "'" . "," .
            " doctor_id=" . "'" . $_GET["edit_doctor_id"] . "'" . "," .
            " patient_id=" . $_GET["edit_patient_id"] . "," .
            " hospital_id=" . $_GET["edit_hospital_id"] .
            " WHERE id=" . $_GET["edit_id"] 
            ;

        pg_query($db, $query);
        header("Location: /visits.php");
    }
    else if ($_GET["request"] == "remove")
    {
        $query = "DELETE FROM visits WHERE id=" . $_GET["remove_id"];

        pg_query($db, $query);
        header("Location: /visits.php");
    }
}

//

$visits = [];
$visits_raw = pg_query($db, "SELECT id, was_at, price, doctor_id, patient_id, hospital_id FROM visits");
while ($visit = pg_fetch_assoc($visits_raw))
{
    $visits[] = [
        "id" => $visit["id"],
        "was_at" => $visit["was_at"],
        "price" => $visit["price"],
        "doctor_id" => $visit["doctor_id"],
        "patient_id" => $visit["patient_id"],
        "hospital_id" => $visit["hospital_id"]
    ];
}

$doctors = [];
$doctors_raw = pg_query($db, "SELECT * FROM doctors");
while ($item = pg_fetch_assoc($doctors_raw))
{
    $doctors[] = [
        "id" => $item["id"],
    ];
}

$patients = [];
$patients_raw = pg_query($db, "SELECT * FROM patients");
while ($item = pg_fetch_assoc($patients_raw))
{
    $patients[] = [
        "id" => $item["id"],
    ];
}

$hospitals = [];
$hospitals_raw = pg_query($db, "SELECT * FROM hospitals");
while ($item = pg_fetch_assoc($hospitals_raw))
{
    $hospitals[] = [
        "id" => $item["id"],
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
    <h2>Visits</h2>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Was at</td>
                <td>Price</td>
                <td>Doctor id</td>
                <td>Patient id</td>
                <td>Hospital id</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($visits as $visit): ?>

            <tr>
                <td><?php echo $visit["id"]; ?></td>
                <td><?php echo $visit["was_at"]; ?></td>
                <td><?php echo $visit["price"]; ?></td>
                <td><?php echo $visit["doctor_id"]; ?></td>
                <td><?php echo $visit["patient_id"]; ?></td>
                <td><?php echo $visit["hospital_id"]; ?></td>
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

        <input type="date" name="add_was_at" placeholder="date">
        <input type="text" name="add_price" placeholder="price">

        <select name="add_doctor_id">
            <?php foreach ($doctors as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["id"]; ?></option>

            <?php endforeach; ?>
        </select>
 
        <select name="add_patient_id">
            <?php foreach ($patients as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["id"]; ?></option>

            <?php endforeach; ?>
        </select>

        <select name="add_hospital_id">
            <?php foreach ($hospitals as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["id"]; ?></option>

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
        <input type="date" name="edit_was_at" placeholder="date">
        <input type="text" name="edit_price" placeholder="price">

        <select name="edit_doctor_id">
            <?php foreach ($doctors as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["id"]; ?></option>

            <?php endforeach; ?>
        </select>
 
        <select name="edit_patient_id">
            <?php foreach ($patients as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["id"]; ?></option>

            <?php endforeach; ?>
        </select>

        <select name="edit_hospital_id">
            <?php foreach ($hospitals as $item): ?>

            <option value="<?php echo $item["id"]; ?>"><?php echo $item["id"]; ?></option>

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