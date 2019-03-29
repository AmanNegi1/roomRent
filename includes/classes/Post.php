<?php
class Post {
	private $user_obj;
	private $con;

	public function __construct($con, $user){
		$this->con = $con;
		$this->user_obj = new User($con, $user);
	}

	public function submitPost($body) {
		$body = strip_tags($body); //removes html tags 
		$body = mysqli_real_escape_string($this->con, $body);
		 $check_empty = preg_replace('/\s+/', '', $body); //Deltes all spaces 
       
		if($check_empty != "") {


			//Current date and time
			$date_added = date("Y-m-d H:i:s");
			//Get username
			$added_by = $this->user_obj->getUsername();

			//If user is on own profile, user_to is 'none'
			

			//insert post 
			$query = mysqli_query($this->con, "INSERT INTO posts (body,added_by,date_added,deleted,likes) VALUES('$body', '$added_by', '$date_added', 'no', '0')");
              $execute1=mysqli_query($this->con,$query);
		
			   	if ($execute1) {
			   		header("Location: expriment.php");
			   	
			   	}
			   	else {
			         echo "Error: " . $query . "<br>" . mysqli_error($this->con);

			         }
			//$returned_id = mysqli_insert_id($this->con);

			//Insert notification 

			//Update post count for user 
			$num_post = $this->user_obj->getNumPosts();
			$num_post++;
			$update_query = mysqli_query($this->con, "UPDATE social SET num_post='$num_post' WHERE username='$added_by'");

		}
	}//end of submit post

	public function loadPostsFriends() {

	//	$page = $data['page']; 
		$userLoggedIn = $this->user_obj->getUsername();

		//if($page == 1) 
		//	$start = 0;
		//else 
		//	$start = ($page - 1) * $limit;

   
		$str = ""; //String to return 
		$data_query = mysqli_query($this->con, "SELECT * FROM posts WHERE deleted='no' ORDER BY id DESC");

		if(mysqli_num_rows($data_query) > 0) {


		//	$num_iterations = 0; //Number of results checked (not necasserily posted)
			$count = 1;

			while($row = mysqli_fetch_array($data_query)) {
				$id = $row['id'];
				$body = $row['body'];
				$added_by = $row['added_by'];
				$date_time = $row['date_added'];

				//Prepare user_to string so it can be included even if not posted to a user
				/*if($row['user_to'] == "none") {
					$user_to = "";
				}*/
			
				//	$user_to_obj = new User($con, $row['user_to']);
				//	$user_to_name = $user_to_obj->getFirstAndLastName();
					//$user_to = "to <a href='" . $row['user_to'] ."'>" . $user_to_name . "</a>";
			

				//Check if user who posted, has their account closed
		//		$added_by_obj = new User($this->con, $added_by);
		//		if($added_by_obj->isClosed()) {
			//		continue;
		//		}

				

				//	if($num_iterations++ < $start)
				//		continue; 


					//Once 10 posts have been loaded, break
				//	if($count > $limit) {
				//		break;
				//	}
				//	else {
				//		$count++;
				//	}

					$user_details_query = mysqli_query($this->con, "SELECT firstname, lastname, profilepic FROM social WHERE username='$added_by'");
					$user_row = mysqli_fetch_array($user_details_query);
					$first_name = $user_row['firstname'];
					$last_name = $user_row['lastname'];
					$profile_pic = $user_row['profilepic'];


					//Timeframe
					$date_time_now = date("Y-m-d H:i:s");
					$start_date = new DateTime($date_time); //Time of post
					$end_date = new DateTime($date_time_now); //Current time
					$interval = $start_date->diff($end_date); //Difference between dates 
					if($interval->y >= 1) {
						if($interval == 1)
							$time_message = $interval->y . " year ago"; //1 year ago
						else 
							$time_message = $interval->y . " years ago"; //1+ year ago
					}
					else if ($interval-> m >= 1) {
						if($interval->d == 0) {
							$days = " ago";
						}
						else if($interval->d == 1) {
							$days = $interval->d . " day ago";
						}
						else {
							$days = $interval->d . " days ago";
						}


						if($interval->m == 1) {
							$time_message = $interval->m . " month". $days;
						}
						else {
							$time_message = $interval->m . " months". $days;
						}

					}
					else if($interval->d >= 1) {
						if($interval->d == 1) {
							$time_message = "Yesterday";
						}
						else {
							$time_message = $interval->d . " days ago";
						}
					}
					else if($interval->h >= 1) {
						if($interval->h == 1) {
							$time_message = $interval->h . " hour ago";
						}
						else {
							$time_message = $interval->h . " hours ago";
						}
					}
					else if($interval->i >= 1) {
						if($interval->i == 1) {
							$time_message = $interval->i . " minute ago";
						}
						else {
							$time_message = $interval->i . " minutes ago";
						}
					}
					else {
						if($interval->s < 30) {
							$time_message = "Just now";
						}
						else {
							$time_message = $interval->s . " seconds ago";
						}
					}

					$str .= "<div class='status_post'>
								<div class='post_profile_pic'>
									<img src='$profile_pic' width='50'>
								</div>

								<div class='posted_by' style='color:#ACACAC;'>
									<a href='$added_by'> $first_name $last_name </a>  &nbsp;&nbsp;&nbsp;&nbsp;$time_message
								</div>
								<div id='post_body'>
									$body
									<br>
								</div>

							</div>
							<hr>";
				

			} //End while loop

			/*if($count > $limit) 
				$str .= "<input type='hidden' class='nextPage' value='" . ($page + 1) . "'>
							<input type='hidden' class='noMorePosts' value='false'>";
			else 
				$str .= "<input type='hidden' class='noMorePosts' value='true'><p style='text-align: centre;'> No more posts to show! </p>";
		*/
}//end of num row count..
		echo $str;



}}



?>