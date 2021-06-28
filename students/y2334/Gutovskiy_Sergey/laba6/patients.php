<?php

$db = pg_connect("host=localhost dbname=postgres user=postgres password=root");

//

if (isset($_GET["request"]))
{
    if ($_GET["request"] == "add")
    {
        $query = "INSERT INTO patients (name, birth, phone) VALUES (" .
            "'{$_GET["add_name"]}', " .
            "'{$_GET["add_birth"]}', " .
            "'{$_GET["add_phone"]}' " .
            ")"
            ;

        pg_query($db, $query);
        header("Location: /patients.php");
    }
    else if ($_GET["request"] == "edit")
    {
        $query = "UPDATE patients SET " . 
            " name=" . "'" . $_GET["edit_name"] . "'" . "," .
            " birth=" . "'" . $_GET["edit_birth"] . "'" . "," .
            " phone=" . "'" . $_GET["edit_phone"] . "'"  .
            " WHERE id=" . $_GET["edit_id"] 
            ;

        pg_query($db, $query);
        header("Location: /patients.php");
    }
    else if ($_GET["request"] == "remove")
    {
        $query = "DELETE FROM patients WHERE id=" . $_GET["remove_id"];

        pg_query($db, $query);
        header("Location: /patients.php");
    }
}

//

$patients = [];
$patients_raw = pg_query($db, "SELECT id, name, phone, date(birth) as birth FROM patients");
while ($patient = pg_fetch_assoc($patients_raw))
{
    $patients[] = [
        "id" => $patient["id"],
        "name" => $patient["name"],
        "birth" => $patient["birth"],
        "phone" => $patient["phone"]
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
    <h2>Patients</h2>
    <table>
        <thead>
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Birth</td>
                <td>Phone</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($patients as $patient): ?>

            <tr>
                <td><?php echo $patient["id"]; ?></td>
                <td><?php echo $patient["name"]; ?></td>
                <td><?php echo $patient["birth"]; ?></td>
                <td><?php echo $patient["phone"]; ?></td>
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
        <input type="text" name="add_phone" placeholder="phone">

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
        <input type="text" name="edit_phone" placeholder="phone">

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