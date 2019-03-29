<?php 
include("includes/navheader.php");
include("includes/classes/User.php");
include("includes/classes/Post.php");


if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text']);
}


 ?>
	
	<div class="main_column column">
		<form class="post_form" action="expriment.php" method="POST">
			<textarea name="post_text" id="post_text" placeholder="Got something to say?"></textarea>
			<input type="submit" name="post" id="post_button" value="Post">
			<hr>

		</form>

		<div class="posts_area"></div>
		<img id="loading" src="assets/images/icons/loading.gif">


	</div>
   <div class="user_details column">
		<a href="<?php echo $userLoggedIn; ?>">  <img src="<?php echo $user['profilepic']; ?>"> </a>

		<div class="user_details_left_right">
			<a href="<?php echo $userLoggedIn; ?>">
			<?php 
			echo $user['firstname'] . " " . $user['lastname'];

			 ?>
			</a>
			<br>
			<?php echo "Posts: " . $user['num_post']. "<br>"; 
			echo "Likes: " . $user['num_likes'];

			?>
		</div>

	</div>






	</div>
</body>
</html>