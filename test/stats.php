<?php

include('templates/header.php');

include('config/db_connect.php');


//-----------------NUMBER OF PROFESSIONALS------------------------------
$sql = 'SELECT COUNT(*) FROM PROFESSIONALS ORDER BY IDno';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of professionals: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(*)'].'</span></div></center></p>';
}

//------------NUMBER OF MODELS--------------------------------------------
$sql = 'SELECT COUNT(DISTINCT ProfID) FROM MODEL ORDER BY ProfID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of models: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(DISTINCT ProfID)'].'</span></div></center></p>';
}


//NUMBER OF ACTORS------------------------------------------------------
$sql = 'SELECT COUNT(*) FROM ACTORS ORDER BY ProfID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of actors: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(*)'].'</span></div></center></p>';
}

//NUMBER OF VOICE ACTORS-----------------------------------------------
$sql = 'SELECT COUNT(DISTINCT ProfID) FROM VOICEACTORS ORDER BY ProfID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of voice actors: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(DISTINCT ProfID)'].'</span></div></center></p>';
}

//NUMBER OF KIDS----------------------------------------------------
$sql = 'SELECT COUNT(*) FROM child ORDER BY ProfID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of kids: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(*)'].'</span></div></center></p>';
}
//NUMBER OF MEN-----------------------------------------------------
$sql = 'SELECT COUNT(*) FROM ADULTMAN ORDER BY ProfID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of men: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(*)'].'</span></div></center></p>';
}
//NUMBER OF WOMEN---------------------------------------------------
$sql = 'SELECT COUNT(*) FROM ADULTWOMAN ORDER BY ProfID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of women: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(*)'].'</span></div></center></p>';
}
//NUMBER OF MANAGERS----------------------------------------------------
$sql = 'SELECT COUNT(*) FROM MANAGER ORDER BY ManagerID';
// get the result set (set of rows)
$result = mysqli_query($conn, $sql);
// fetch the resulting rows as an array


while ($row = mysqli_fetch_array($result))
{
	echo '<p><center><div style="font-size:1.25em;color:#0e3c68;font-weight:bold;">Number of managers: <span style="font-size:1.25em;color:#0e3c68;font-weight:bold;">'.$row['COUNT(*)'].'</span></div></center></p>';
}
//--------------------------------------------------------------------
include('templates/footer.php');

$conn->close();
?>
