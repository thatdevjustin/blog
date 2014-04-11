<!doctype html>
<html>
<head></head>
<body>
	<div id="wrapper">
		<div id="main">
			<h1>Welcome to my blog</h1>
			<div id="blogPost">
				<?php
					include 'include.php';

					$blogPosts = GetBlogPosts();
					foreach ($blogPosts as $post) {
						echo "<div class='post'>";
						echo "<h2>" . $post->title . "</h2>";
						echo "<p>" . $post->post . "</p>";
						echo "<span class='post_footer'>Posted By: " . $post->author . " Posted On: " . $post->datePosted . " Tags: " . $post->tags . "</span>";
						echo "</div>";
					}
				?>
			</div>
		</div>
	</div>
</body>
</html>