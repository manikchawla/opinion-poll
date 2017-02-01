<?php 

class Opinion_poll_model {
	private $db_handle;
	private $host = 'localhost';
	private $db = 'opinion_poll';
	private $uid = 'root';
	private $password = '';

	public function __construct() {
		$this->db_handle = mysqli_connect($this->host, $this->uid, $this->password);
		if (!$this->db_handle) 
			die("Unable to connect to MySQL" . mysqli_error());

		if (!mysqli_select_db($this->db_handle, $this->db)) 
			die("Unable to select database" . mysqli_error());
	}

	public function execute_query($sql_stmt) {
		$result = mysqli_query($this->db_handle, $sql_stmt);
		return !$result ? FALSE : TRUE;
	} 

	public function select($sql_stmt) {
		$result = mysqli_query($this->db_handle, $sql_stmt);
		if (!$result) 
			die("Database access failed. " . mysqli_error($this->db_handle));
		$data = array();

		if ($rows = mysqli_num_rows($result)) {
			while ($row = mysqli_fetch_row($result)) {
				$data = $row;
			}
		}
		return $data;
	}

	public function insert($sql_stmt) {
		$this->execute_query($sql_stmt);
	}

	public function __destruct() {
		mysqli_close($this->db_handle);
	}

}

?>