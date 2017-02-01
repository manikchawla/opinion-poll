<?php 

require_once 'opinion_poll_model.php';

$model = new Opinion_poll_model();

if (count($_POST) == 1) {
	echo "<script> alert('You did not vote!'); </script>";
}

else if (count($_POST) > 1) {
	$ts = date("Y-m-d H:i:s");
	$option = $_POST['vote'];
	$sql_stmt = "INSERT INTO tv_shows (choice, ts)
				VALUES ($option, '$ts')";
	$model->insert($sql_stmt);
	$sql_stmt = "SELECT * FROM tv_shows;";
	$hey = $model->select($sql_stmt);
	$sql_stmt = "SELECT COUNT(choice) FROM tv_shows;";
	$choices_count = $model->select($sql_stmt);
	$libraries = array("", "Game of Thrones", "The Walking Dead", "House of Cards", "Breaking Bad");
	$table_rows = '';

	for ($i = 1; $i < 5; $i++) {
		$sql_stmt = "SELECT COUNT(choice) FROM tv_shows WHERE choice = $i;";
        $result = $model->select($sql_stmt);
        $table_rows .= "<tr><td>" . $libraries [$i] . " Got:</td><td><b>" . $result[0] . "</b> votes</td></tr>";
	}

	require 'results.html.php';
    exit;
}

require 'opinion.html.php';

?>