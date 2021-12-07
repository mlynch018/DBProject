<?php

include('config/db_connect.php');

$IDno = $Fname = $Mname = $Lname = $UID = $ManID = '';
$errors = array('IDno' => '', 'Fname' => '', 'Lname' => '');

	if(isset($_POST['submit'])){

		if(empty($_POST['IDno'] ))
		{
			$errors['IDno']='An ID number is required for professionals.';
		}
		else
		{
			$IDno = $_POST['IDno'];
		}

		if (empty($_POST['Fname']))
		{
			$errors['Fname']='A first name is required for professionals.<br />';
		}
		else
		{
			$Fname = $_POST['Fname'];
		}
	
		$Mname = $_POST['Mname'];

		if (empty($_POST['Lname']))
		{
			$errors['Lname']='A Last name is required for professionals.<br />';
		}
		else
		{
			$Lname = $_POST['Lname'];
		}

		$UID = $_POST['UID'];
		$ManID = $_POST['ManID'];

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			//echo 'form is valid';
			$IDno = mysqli_real_escape_string($conn, $_POST['IDno']);
			$Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
			$Mname = mysqli_real_escape_string($conn, $_POST['Mname']);
			$Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
			$UID = mysqli_real_escape_string($conn, $_POST['UID']);
			$ManID = mysqli_real_escape_string($conn, $_POST['ManID']);

			//sql insert command
			$sql = "INSERT INTO professionals(IDno,Fname,Mname,Lname,UID,ManID) VALUES('$IDno','$Fname','$Mname','$Lname','$UID','$ManID')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}
		}
	}
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<section class="container grey-text">
		<h4 class="center">Add a Professional</h4>
		<form class="white" action="add.php" method="POST">
			<label>ID number:</label>
			<input type="text" name="IDno" value="<?php echo htmlspecialchars($IDno) ?>">
			<div class="red-text"><?php echo $errors['IDno']; ?></div>
			<label>First Name:</label>
			<input type="text" name="Fname" value="<?php echo htmlspecialchars($Fname) ?>">
			<div class="red-text"><?php echo $errors['Fname']; ?></div>
			<label>Middle Name:</label>
			<input type="text" name="Mname" value="<?php echo htmlspecialchars($Mname) ?>">
			<label>Last Name:</label>
			<input type="text" name="Lname" value="<?php echo htmlspecialchars($Lname) ?>">
			<div class="red-text"><?php echo $errors['Lname']; ?></div>
			<label>Union ID:</label>
			<input type="text" name="UID" value="<?php echo htmlspecialchars($UID) ?>">
			<label>Manager ID:</label>
			<input type="text" name="ManID" value="<?php echo htmlspecialchars($ManID) ?>">
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
