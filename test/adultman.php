<?php

include('config/db_connect.php');

$sql = 'SELECT PROFESSIONALS.Fname, PROFESSIONALS.Mname, PROFESSIONALS.Lname, ADULTMAN.suitSize, ADULTMAN.waist, ADULTMAN.sleeve, ADULTMAN.neck, professionals.IDno FROM professionals, adultman WHERE adultman.profID=professionals.IDno ORDER BY adultman.profID';
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

	<h4 class="center grey-text">Men!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($profs as $prof){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($prof['Fname']); echo " "; echo htmlspecialchars($prof['Mname']); echo " ";  echo htmlspecialchars($prof['Lname']) ?></h5>
							<div><?php echo "Suit Size: " ; echo htmlspecialchars($prof['suitSize']);?></div>
							<div><?php echo "Waist: " ; echo htmlspecialchars($prof['waist']);?></div>
							<div><?php echo "Sleeve/Neck: " ; echo htmlspecialchars($prof['sleeve']); echo"/"; echo htmlspecialchars($prof['neck']);?></div>
						</div>
						<div class="card-action right-align">
							<a class="brand-text" href="details.php?id=<?php echo $prof['IDno']?>">more info</a>
						</div>
					</div>
				</div>

			<?php } ?>

		</div>
	</div>

	<?php include('templates/footer.php'); ?>

</html>
