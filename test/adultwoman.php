<?php

include('config/db_connect.php');

$sql = 'SELECT PROFESSIONALS.Fname, PROFESSIONALS.Mname, PROFESSIONALS.Lname, ADULTWOMAN.dressSize, ADULTWOMAN.bust, professionals.IDno FROM PROFESSIONALS, adultwoman WHERE adultwoman.profID=professionals.IDno ORDER BY adultwoman.profID';
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

	<h4 class="center grey-text">Women!</h4>

	<div class="container">
		<div class="row">

			<?php foreach($profs as $prof){ ?>

				<div class="col s6 md3">
					<div class="card z-depth-0">
						<div class="card-content center">
							<h5><?php echo htmlspecialchars($prof['Fname']); echo " "; echo htmlspecialchars($prof['Mname']); echo " ";  echo htmlspecialchars($prof['Lname']) ?></h5>
							<div><?php echo "Dress Size: " ; echo htmlspecialchars($prof['dressSize']);?></div>
							<div><?php echo "Bust: " ; echo htmlspecialchars($prof['bust']);?></div>
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
