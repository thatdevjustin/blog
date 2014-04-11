<?php
	include 'core/include.php';
?>
<!doctype html>
<html>
<head>
<link rel="stylesheet" href="css/style.css" type="text/css" />
</head>
<body>
	<div id="wrapper">
		<div id="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="register.php">Register</a></li>
				<li><a href="login.php">Login</a></li>
			</ul>
		</div>
		<div id="main">
			<h1>Welcome to my blog</h1>
			<div id="blogPost">
				<?php
					$blogPosts = GetBlogPosts();
					foreach ($blogPosts as $post) {
						echo "<div class='post'>";
						echo "<h2>" . $post->title . "</h2>";
						echo "<p>" . $post->body . "</p>";
						echo "<span class='post_footer'>Posted By: " . $post->author . " Posted On: " . $post->datePosted . " Tags: " . $post->tags . "</span>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>