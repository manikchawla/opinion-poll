<!DOCTYPE html>

<html>
	<head>
		<title>TV Shows Poll Results</title>
	</head>

	<body>
		<h2>Opinion Poll Results</h2>
		<p><b>What is your favourite TV Show?</b></p>
		<p><b><?php echo $choices_count[0]; ?></b> people have thus far taken part in this poll:</p>
		<table>
            <?php echo($table_rows); ?>
        </table>
	</body>
</html>