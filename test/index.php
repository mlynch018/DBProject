<?php

include('config/db_connect.php');

// write query for all pizzas
$sql = 'SELECT * FROM PROFESSIONALS ORDER BY IDno';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array
$profs = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free the $result from memory (good practise)
mysqli_free_result($result);


$conn->close();
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Professionals!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($profs as $prof){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($prof['Fname']); echo " "; echo htmlspecialchars($prof['Mname']); echo " ";  echo htmlspecialchars($prof['Lname']) ?></h5>
							<div><?php echo "ID: " ; echo htmlspecialchars($prof['IDno']);?></div>
							<div><?php echo "Manager ID: " ; echo htmlspecialchars($prof['ManID']);?></div>
							<div><?php echo "Union ID: " ; echo htmlspecialchars($prof['UID']);?></div>
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
