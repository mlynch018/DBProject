<?php

include('config/db_connect.php');

$sql = 'SELECT professionals.Fname, professionals.Mname, professionals.Lname FROM professionals, actors WHERE actors.ProfID = professionals.IDno GROUP BY actors.ProfID;';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array
$as = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free the $result from memory (good practise)
mysqli_free_result($result);


$conn->close();
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Managers!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($as as $a){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($a['Fname']); echo " "; echo htmlspecialchars($a['Mname']); echo " ";  echo htmlspecialchars($a['Lname']) ?></h5>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="#">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
