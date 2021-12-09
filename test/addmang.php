<?php 

include('config/db_connect.php');

$ManID = $Fname = $Mname = $Lname = $Email = $Area_code = $Local_phone = '';
$errors = array('ManID' => '', 'Fname' => '', 'Lname' => '');

	if(isset($_POST['submit'])){

		if(empty($_POST['ManID'] ))
		{
			$errors['ManID']='An ID number is required for managers.';
		}
		else
		{
			$ManID = $_POST['ManID'];
		}


		if (empty($_POST['Fname']))
		{
			$errors['Fname']='A first name is required for managers.<br />';
		}
		else
		{
			$Fname = $_POST['Fname'];
		}
	
		$Mname = $_POST['Mname'];

		if (empty($_POST['Lname']))
		{
			$errors['Lname']='A Last name is required for managers.<br />';
		}
		else
		{
			$Lname = $_POST['Lname'];
		}

		$Email=$_POST['Email'];
		$Area_code=$_POST['Area_code'];
		$Local_phone=$_POST['Local_phone'];

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			//echo 'form is valid';
			$ManID = mysqli_real_escape_string($conn, $_POST['ManID']);
			$Fname = mysqli_real_escape_string($conn, $_POST['Fname']);
			$Mname = mysqli_real_escape_string($conn, $_POST['Mname']);
			$Lname = mysqli_real_escape_string($conn, $_POST['Lname']);
			$Email = mysqli_real_escape_string($conn, $_POST['Email']);
			$Area_code = mysqli_real_escape_string($conn, $_POST['Area_code']);
			$Local_phone = mysqli_real_escape_string($conn, $_POST['Local_phone']);

			//sql insert command
			$sql = "INSERT INTO manager(ManagerID,Email,Area_code,Local_Phone) VALUES('$ManID','$Email','$Area_code','$Local_phone')";

			// save to db and check
			if(mysqli_query($conn, $sql)){
				// success
				header('Location: index.php');
			} else {
				echo 'query error: '. mysqli_error($conn);
			}

			//sql insert command
			$sql = "INSERT INTO mannames(ManID,Fname,Mname,Lname) VALUES('$ManID','$Fname','$Mname','$Lname')";

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
		<form class="white" action="addmang.php" method="POST">
			<label>ID Number:</label>
			<input type="text" name="ManID" value="<?php echo htmlspecialchars($ManID) ?>">
			<div class="red-text"><?php echo $errors['ManID']; ?></div>
			<label>First Name:</label>
			<input type="text" name="Fname" value="<?php echo htmlspecialchars($Fname) ?>">
			<div class="red-text"><?php echo $errors['Fname']; ?></div>
			<label>Middle Name:</label>
			<input type="text" name="Mname" value="<?php echo htmlspecialchars($Mname) ?>">
			<label>Last Name:</label>
			<input type="text" name="Lname" value="<?php echo htmlspecialchars($Lname) ?>">
			<div class="red-text"><?php echo $errors['Lname']; ?></div>
			<label>Email:</label>
			<input type="text" name="Email" value="<?php echo htmlspecialchars($Email) ?>">
			<label>Area Code:</label>
			<input type="integer" name="Area_code" value="<?php echo htmlspecialchars($Area_code) ?>">
			<label>Phone Number:</label>
			<input type="integer" name="Local_phone" value="<?php echo htmlspecialchars($Local_phone) ?>">
			<div class="center">
				<input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
