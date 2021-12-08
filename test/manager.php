<?php

include('config/db_connect.php');

$sql = 'SELECT mannames.Fname, mannames.Mname, mannames.Lname, manager.Email, manager.Area_code, Manager.Local_phone, Manager.ManagerID FROM manager, mannames WHERE Manager.managerID=mannames.ManID ORDER BY ManagerID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array
$mans = mysqli_fetch_all($result, MYSQLI_ASSOC);
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

			<?php foreach($mans as $man){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($man['Fname']); echo " "; echo htmlspecialchars($man['Mname']); echo " ";  echo htmlspecialchars($man['Lname']) ?></h5>
							<div><?php echo "ID: " ; echo htmlspecialchars($man['ManagerID']);?></div>
							<div><?php echo "Email: " ; echo htmlspecialchars($man['Email']);?></div>
							<div><?php echo "Phone: (" ; echo htmlspecialchars($man['Area_code']); echo ") "; echo htmlspecialchars($man['Local_phone']);?></div>
							<div class="card-action right-align">
						</div>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
