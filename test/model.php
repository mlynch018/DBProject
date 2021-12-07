<?php

include('config/db_connect.php');

$sql = 'SELECT professionals.Fname, professionals.Mname, professionals.Lname FROM professionals, model WHERE model.ProfID = professionals.IDno GROUP BY model.ProfID;';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array
$ms = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

			<?php foreach($ms as $m){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($m['Fname']); echo " "; echo htmlspecialchars($m['Mname']); echo " ";  echo htmlspecialchars($m['Lname']) ?></h5>
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
