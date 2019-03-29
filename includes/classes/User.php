<?php
class User {
	private $user;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$user_query = mysqli_query($con, "SELECT * FROM social WHERE username='$user'");
		$this->user = mysqli_fetch_array($user_query);
	}

	public function getUsername() {
		return $this->user['username'];
	}

	public function getNumPosts() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT num_post FROM social WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['num_post'];
	}

	public function getFirstAndLastName() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT firstname, lastname FROM social WHERE username='$username'");
		$row = mysqli_fetch_array($query);
		return $row['firstname'] . " " . $row['lastname'];
	}

	public function isClosed() {
		$username = $this->user['username'];
		$query = mysqli_query($this->con, "SELECT user_closed FROM social WHERE username='$username'");
		$row = mysqli_fetch_array($query);

		if($row['user_closed'] == 'yes')
			return true;
		else 
			return false;
	}

	




}

?>