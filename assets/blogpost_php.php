<?php

class BlogPost

{
	public $id;
	public $title;
	public $post;
	public $author;
	public $tags;
	public $datePosted;

    function __construct($inID=null, $inTitle = null, $inPost = null , $inAuthor = null, $nDatePosted = null)
	{
		if(!empty($inID))
		{
			$this->id = $inID;
		}
		
		if(!empty($inTitle))
		{
			$this->title = $inTitle;
		}
		
		if(!empty($inPost))
		{
			$this->post = $inPost;
		}
		
		if (!empty($inAuthor))
		{
			$query = mysql_query("select first_name,last_name from people where id = " . $inAuthor);
			$row = mysql_fetch_assoc($query);
			$this->author = $row["first_name"] . " " . $row["last_name"];
		}
		
		if(!empty($inID))
		{			
			$tag_query = mysql_query("select t.id,t.name from tags t, blog_post_tags b where t.id = b.tag_id and b.blog_post_id = " . $inID);
			$tagArray = array();
			$tagIDArray = array();
			while($row = mysql_fetch_assoc($tag_query))
			{
				array_push($tagArray,$row["name"]);
				array_push($tagIDArray,$row["id"]);
			}
			
			$postTags = null;
			
			if(sizeof($tagArray) >0 )
			{
				foreach($tagArray as $tag)
				{
					$postTags = $postTags . "," . $tag;			
				}
			}
			else
			{
				$postTags = "No Tags";
			}
			
				
			$this->tags = $postTags;
		}
		
		if(!empty($inDatePosted))
		{
			//mySql returns dates in format yyyy-mm-dd
			$splitDate = explode("-",$inDatePosted);
			$this->datePosted = $splitDate[2] . "/" . $splitDate[1] . "/" . $splitDate[0];
		}
		
	}
}

?>