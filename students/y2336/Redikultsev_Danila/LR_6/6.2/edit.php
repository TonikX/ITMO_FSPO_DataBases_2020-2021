<?php
    include 'connection.php';

    $connect = mysqli_connect('localhost','root','','lab_6');

    if (isset($_GET['edit'])) {

        $id = $_GET['edit'];
        $query = mysqli_query($connect,"Select id,contract,full_name,short_name,address,bunk_sum,specialization from organization where id = $id ");
		$row = mysqli_fetch_array($query,MYSQLI_ASSOC);
		
		
		if($row){
			$_SESSION['id']= $row['id'];
			$_SESSION['contract'] = $row['contract'];
			$_SESSION['full_name'] = $row['full_name'];
			$_SESSION['short_name'] = $row['short_name'];
			$_SESSION['address'] = $row['address'];
			$_SESSION['bunk_sum'] = $row['bunk_sum'];
			$_SESSION['specialization'] = $row['specialization'];
		}
		else{
			
			echo "Error";
		}

    }

    if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$contract = $_POST['contract'];
		$full_name = $_POST['full_name'];
		$short_name = $_POST['short_name'];
		$address = $_POST['address'];
		$bunk_sum = $_POST['bunk_sum'];
		$specialization = $_POST['specialization'];
	
		$sql = "update organization set contract = '".$contract."', full_name = '".$full_name."', short_name = '".$short_name."', address = '".$address."',bunk_sum = '".$bunk_sum."',specialization = '".$specialization."' where id = '".$id."' ";
		
		$query=mysqli_query($con,$sql);
		if($query){
		  header("location: dashboard.php");
		  echo "Success";
		}else{
			
			echo mysqli_error($con);
		}
	 
	   
	}
 
?>

<!DOCTYPE html>
	<html>
	<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" type = "text/css" href = "style.css"/>
		<title>Student Record</title>
	</head>
	<body>
    <h1>EDIT RECORD</h1>
        <div id="container">
            <form method="post" enctype="multipart/form-data" id="form-box">
                    <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>" class="input" required/>
                    Контракт : <input type="text" name="name" id="name" value="<?php echo $_SESSION['contract']; ?>" class="input" required/> <br/><br/>
                    Полное имя : <input type="text" name="username" value="<?php echo $_SESSION['full_name']; ?>" class="input" required/> <br/><br/>
                    Краткое имя : <input type="password" name="password" value="<?php echo $_SESSION['short_name']; ?>" class="input" required/> <br/><br/>
                    Адрес : <input type="text" name="email" value="<?php echo $_SESSION['address']; ?>"  class="input" required/> <br/><br/>
                    Счет в банке : <input type="text" name="phone" value="<?php echo $_SESSION['bunk_sum']; ?>" class="input"required/> <br/><br/>
                    Специализация : <input type="text" name="address" value="<?php echo $_SESSION['specialization']; ?>" class="input" required/> <br/><br/>
                    <input class="register" type="submit" name="update" value="UPDATE">
                    <button class="back"><a href="dashboard.php">BACK</a></button>
            </form>
        </div>
    </body>
</html>