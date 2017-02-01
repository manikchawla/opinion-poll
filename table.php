<?php 

CREATE TABLE tv_shows (
	'id' int(11) NOT NULL AUTO_INCREMENT,
	'choice' tinyint(4) NOT NULL DEFAULT '0',
	'ts' timestamp NULL DEFAULT NULL,
	PRIMARY KEY ('id')
);


$sql = "CREATE DATABASE opinion_poll";
		if (mysqli_query($this->db_handle, $sql)) {
		    echo "Database created successfully";
		} else {
		    echo "Error creating database: " . mysqli_error($this->db_handle);
		}

?>