<?php

include('config/db_connect.php');

$IDno = $Eye_color = $Headshot = $Hair_color = $Shoe_size = $Weight = $Height = '';
$errors = array('IDno' => '');

	if(isset($_POST['submit'])){

		if(empty($_POST['IDno'] ))
		{
			$errors['IDno']='An ID number is required for professionals.';
		}
		else
		{
			$IDno = $_POST['IDno'];
		}

		$Eye_color=$_POST['Eye_color'];
		$Headshot=$_POST['Headshot'];
		$Hair_color=$_POST['Hair_color'];
		$Shoe_size=$_POST['Shoe_size'];
		$Weight=$_POST['Weight'];
		$Height=$_POST['Height'];

		if(array_filter($errors)){
			//echo 'errors in form';
		} else {
			//echo 'form is valid';
			$IDno = mysqli_real_escape_string($conn, $_POST['IDno']);
			$Eye_color = mysqli_real_escape_string($conn, $_POST['Eye_color']);
			$Headshot = mysqli_real_escape_string($conn, $_POST['Headshot']);
			$Hair_color = mysqli_real_escape_string($conn, $_POST['Hair_color']);
			$Shoe_size = mysqli_real_escape_string($conn, $_POST['Shoe_size']);
			$Weight = mysqli_real_escape_string($conn, $_POST['Weight']);
			$Height = mysqli_real_escape_string($conn, $_POST['Height']);

			//sql insert command
			$sql = "UPDATE `characteristics` SET ProfID='$IDno', Shoe_size='$Shoe_size', Eye_color='$Eye_color', Headshot='$Headshot', Hair_color='$Hair_color', Weight='$Weight', Height='$Height' WHERE ProfID=$IDno;";

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
		<h4 class="center">Update a Professional's Characteristics</h4>
		<form class="white" action="update.php" method="POST">
			<label>ID Number:</label>
			<input type="text" name="IDno" value="<?php echo htmlspecialchars($IDno) ?>">
			<div class="red-text"><?php echo $errors['IDno']; ?></div>
			<label>Eye Color:</label>
			<input type="text" name="Eye_color" value="<?php echo htmlspecialchars($Eye_color) ?>">
			<label>Headshot:</label>
			<input type="text" name="Headshot" value="<?php echo htmlspecialchars($Headshot) ?>">
			<label>Hair Color:</label>
			<input type="text" name="Hair_color" value="<?php echo htmlspecialchars($Hair_color) ?>">
			<label>Shoe Size:</label>
			<input type="float" name="Shoe_size" value="<?php echo htmlspecialchars($Shoe_size) ?>">
			<label>Weight:</label>
			<input type="integer" name="Weight" value="<?php echo htmlspecialchars($Weight) ?>">
			<label>Height:</label>
			<input type="integer" name="Height" value="<?php echo htmlspecialchars($Height) ?>">
			<div class="center">
				<input type="submit" name="submit" value="Update" class="btn brand z-depth-0">
			</div>
		</form>
	</section>

	<?php include('templates/footer.php'); ?>

</html>
