<?php
	class BlogPost {
		public $id;
		public $title;
		public $body;
		public $author;
		public $tags;
		public $datePosted;

		function __construct($inId=null, $inTitle=null, $inPost=null, $inAuthorId=null, $inDatePosted=null) {
			//Setting the Post info
			if (!empty($inId)){
				$this->id = $inId;
			}
			if (!empty($inTitle)){
				$this->title = $inTitle;
			}
			if (!empty($inPost)){
				$this->post = $inPost;
			}
			//Setting up the Date
			if (!empty($inDatePosted))
				$splitDate = explode("-", $inDatePosted);
				$this->datePosted = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];
			}
			//Setting up the Author
			if (!empty($inAuthorId))
				$query = $mysql_query("SELECT first_name, last_name FROM People WHERE id = " . $inAuthorId);
				$row = mysql_fetch_assoc($query);
				$this->author = $row["first_name"] . " " . $row["last_name"];
			}
			//Setting up the Tags
			$postTags = "No Tags";
			if (!empty($inId)){
				$query = $mysql_query("SELECT tags.* FROM post_tag LEFT JOIN (tags) ON (post_tag.tag_id = tags.id) WHERE post_tag.post_id = " . $inId);
				$tagArray = array();
				$tagIDArray = array();
				while($row = mysql_fetch_assoc($query)) {
					array_push($tagArray, $row["name"]);
					array_push($tagIDArray, $row["id"]);
				}
				if (sizeof($tagArray) > 0) {
					foreach ($tagArray as $tag) {
						if($postTags == "No tags."){
							$postTags = $tag;
						}else {
							$postTags = $postTags . ", " . $tag;
						}
					}
				}
			}
			$this->tags = $postTags;
		}
	}
?>