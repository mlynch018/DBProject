<?php

include('config/db_connect.php');

$sql = 'SELECT professionals.Fname, professionals.Mname, professionals.Lname, professionals.IDno FROM professionals, child WHERE child.ProfID = professionals.IDno GROUP BY child.ProfID;';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array
$ks = mysqli_fetch_all($result, MYSQLI_ASSOC);
// free the $result from memory (good practise)
mysqli_free_result($result);


$conn->close();
?>

<!DOCTYPE html>
<html>
	
	<?php include('templates/header.php'); ?>

	<h4 class="center grey-text">Kids!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($ks as $k){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($k['Fname']); echo " "; echo htmlspecialchars($k['Mname']); echo " ";  echo htmlspecialchars($k['Lname']) ?></h5>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $k['IDno']?>">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
