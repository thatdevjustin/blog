<?php
	class BlogPost {
		public $id;
		public $title;
		public $body;
		public $author;
		public $tags;
		public $datePosted;

		public function __construct($inId=null, $inTitle=null, $inPost=null, $inAuthorId=null, $inDatePosted=null, $inTags=null) {
			//Setting the Post info
			if (!empty($inId)){
				$this->id = $inId;
			}
			if (!empty($inTitle)){
				$this->title = $inTitle;
			}
			if (!empty($inPost)){
				$this->body = $inPost;
			}
			//Setting up the Tags
			if (!empty($inTags)){
				$this->tags = $inTags;
			}
			//Setting up the Date
			if (!empty($inDatePosted)){
				$splitDate = explode("-", $inDatePosted);
				$this->datePosted = $splitDate[1] . "/" . $splitDate[2] . "/" . $splitDate[0];
			}
			//Setting up the Author
			if (!empty($inAuthorId)){
				$query = mysql_query("SELECT first_name, last_name FROM People WHERE id = " . $inAuthorId);
				$row = mysql_fetch_assoc($query);
				$this->author = $row["first_name"] . " " . $row["last_name"];
			}
		}
	}
?>