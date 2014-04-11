<?php
	include 'blogpost.php';

	$connection = mysql_connect("localhost","root","") or die("<p id='sql_error'>Sorry, we were unable to connect to the database.</p>");
	$database = "home";
	mysql_select_db($database, $connection) or die("<p id='sql_error'>Sorry, we were unable to connect to the database.</p>");

	function GetBlogPosts($inId=null,$inTagId=null){
		if(!empty($inId)){
			$query = mysql_query("SELECT * FROM post WHERE id = " . $inId . " ORDER BY id DESC");
		}elseif (!empty($inTagId)) {
			$query = mysql_query("SELECT post.* FROM post_tag LEFT JOIN (post) ON (post_tag.postID = post.id) WHERE post_tag.tagID =" . $tagID . " ORDER BY post.id DESC");
		}else {
			$query = mysql_query("SELECT * FROM post ORDER BY id DESC");
		}

		$postArray = array();
		while($row = mysql_fetch_assoc($query)){
			$myPost = new BlogPost($row["id"],$row["title"],$row["body"],$row["author_id"],$row["date_posted"]);
			array_push($postArray, $myPost);
		}
		return $postArray;
	}
?>