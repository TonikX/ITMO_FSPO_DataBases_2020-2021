<?php
    $dbuser = 'postgres';
    $dbpass = '1234';
    $host = 'localhost';
    $port = '5433';
    $dbname = 'laba3';

    $db = pg_connect("host=$host port=$port dbname=$dbname user=$dbuser password=$dbpass");

    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        $query = pg_query($db,"Select doctor_id,doctor_fio,doctor_specializacion,doctor_learn,doctor_gender,doctor_birthday,doctor_work,doctor_contract from laba3.doctors where doctor_id = $id ");
		    $row = pg_fetch_array($query);


		if($row){
			$_SESSION['doctor_id']= $row['doctor_id'];
			$_SESSION['doctor_fio'] = $row['doctor_fio'];
			$_SESSION['doctor_specializacion'] = $row['doctor_specializacion'];
			$_SESSION['doctor_learn'] = $row['doctor_learn'];
			$_SESSION['doctor_gender'] = $row['doctor_gender'];
			$_SESSION['doctor_birthday'] = $row['doctor_birthday'];
			$_SESSION['doctor_work'] = $row['doctor_work'];
      $_SESSION['doctor_contract'] = $row['doctor_contract'];
		}
		else{

			echo "Error";
		}

    }

    if (isset($_POST['update'])) {
		$doctor_id = $_POST['doctor_id'];
		$doctor_fio = $_POST['doctor_fio'];
		$doctor_specializacion = $_POST['doctor_specializacion'];
		$doctor_learn = $_POST['doctor_learn'];
		$doctor_gender = $_POST['doctor_gender'];
		$doctor_birthday = $_POST['doctor_birthday'];
		$doctor_work = $_POST['doctor_work'];
    $doctor_contract = $_POST['doctor_contract'];

		$sql = "update laba3.doctors set  doctor_fio = '".$doctor_fio."', doctor_specializacion = '".$doctor_specializacion."', doctor_learn = '".$doctor_learn."', doctor_gender = '".$doctor_gender."',doctor_birthday = '".$doctor_birthday."',doctor_work = '".$doctor_work."',doctor_contract = '".$doctor_contract."' where doctor_id = $doctor_id ";

		$query=pg_query($db,$sql);
		if($query){
		  header("location: index.php");
		  echo "Success";
		}else{

			echo pg_error($db);
		}


	}

?>

<!DOCTYPE html>
	<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" href = "style.css"/>
	</head>
	<body>
    <h1>Редактирование</h1>
        <div id="container">
            <form method="post" enctype="multipart/form-data" id="form-box">
                    <input type="hidden" name="doctor_id" class="input" required value="<?php echo $_SESSION['doctor_id']; ?>"/>
                    Фио : <input type="text" name="doctor_fio" id="name" class="input" required value="<?php echo $_SESSION['doctor_fio']; ?>"/> <br/><br/>
                    Специальность : <input type="text" name="doctor_specializacion"  class="input" required value="<?php echo $_SESSION['doctor_specializacion']; ?>"/> <br/><br/>
                    Образование : <input type="text" name="doctor_learn"  class="input" required value="<?php echo $_SESSION['doctor_learn']; ?>"/> <br/><br/>
                    Пол : <input type="text" name="doctor_gender"  class="input" required value="<?php echo $_SESSION['doctor_gender']; ?>"/> <br/><br/>
                    Дата рождения : <input type="text" name="doctor_birthday"  class="input"required value="<?php echo $_SESSION['doctor_birthday']; ?>"/> <br/><br/>
                    Дата устройства на работу : <input type="text" name="doctor_work"  class="input" required value="<?php echo $_SESSION['doctor_work']; ?>"/> <br/><br/>
                    Контракт : <input type="text" name="doctor_contract"  class="input" required value="<?php echo $_SESSION['doctor_contract']; ?>"/> <br/><br/>
                    <input class="register" type="submit" name="update" value="UPDATE">
                    <button class="back"><a href="index.php">BACK</a></button>
            </form>
        </div>
    </body>
</html>
