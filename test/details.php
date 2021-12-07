<?php 

	include('config/db_connect.php');

	// check GET request id param
	if(isset($_GET['id'])){
		
		// escape sql chars
		$id = mysqli_real_escape_string($conn, $_GET['id']);

		// make sql
		$sql = "SELECT * FROM characteristics, professionals WHERE ProfID = $id AND characteristics.ProfID = professionals.IDno";

		// get the query result
		$result = mysqli_query($conn, $sql);

		// fetch result in array format
		$person = mysqli_fetch_assoc($result);

		mysqli_free_result($result);
		mysqli_close($conn);

	}

?>

<!DOCTYPE html>
<html>

	<?php include('templates/header.php'); ?>

	<div class="container center">
		<?php if($person): ?>
			<h4><?php echo $person['Fname']; echo ' '; echo $person['Mname']; echo ' '; echo $person['Lname']; ?></h4>
			<p>Shoe size: <?php echo $person['Shoe_size']; ?></p>
			<p>Eye color: <?php echo $person['Eye_color']; ?></p>
			<p>Headshot: <?php echo $person['Headshot']; ?></p>
			<p>Hair color: <?php echo $person['Hair_color']; ?></p>
			<p>Weight: <?php echo $person['Weight']; ?></p>
			<p>Height: <?php echo $person['Height']; ?></p>
		<?php else: ?>
			<h5>No characteristics for this person exists.</h5>
		<?php endif ?>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
