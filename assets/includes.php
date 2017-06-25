<?php

include 'blogpost_php.php';

$connection = mysql_connect("localhost", "root", "") or die ("<p class='error'>Sorry, we were unable to connect to the database server.</p>");
$database = "krishinpillay_blog";
mysql_select_db($database, $connection) or die ("<p class='error'>Sorry, we were unable to connect to the database.</p>");

function GetBlogPosts($inID = null, $inTagID = null)
{
	if(!empty($inID))
	{
		$query = mysql_query("select * from blog_posts where id = " . $inID . " order by id DESC");
		
	}
	else if(!empty($inTagID))
	{
		$query = mysql_query("select * from blog_posts b, blog_post_tags t where t.tag_id = " . $inTagID . " and t.blog_post_id = b.id order by b.id DESC");
	}
	else
	{
		$query = mysql_query("select * from blog_posts order by id DESC");
	}
	
	$postArray = array();
	while($row = mysql_fetch_assoc($query))
	{
		 $myPost = new BlogPost($row["id"], $row['title'], $row['post'], $row["author_id"], $row['date_posted']);
		 array_push($postArray,$myPost);
		 
	}
	
	return $postArray;
	
}

function GetBlogSingle($inID=null)
{
	if(!empty($inID))
	{
		$myPost = null;
		$query = mysql_query("select * from blog_posts where id = " . $inID . " order by id DESC");
		$row = mysql_fetch_assoc($query);
		$myPost = new BlogPost($row["id"], $row['title'], $row['post'], $row["author_id"], $row['date_posted']);
		return $myPost;
	}
	else
	{
		return null;
	}
}

function GetNextPost($inID=null)
{
	if(!empty($inID))
	{
		$nextID = $inID + 1;
		$myPost = null;
		$query = mysql_query("select count(*) total from blog_posts where id = " . $nextID . " order by id DESC");
		$row = mysql_fetch_assoc($query);
		if($row["total"] > 0) 
		{
		  return $nextID;
		}
		else
		{
			return 0;
		}
		
		
	}
	else
	{
		return null;
	}
}

function GetPreviousPost($inID=null)
{
	if(!empty($inID))
	{
		$prevID = $inID - 1;
		$myPost = null;
		$query = mysql_query("select count(*) total from blog_posts where id = " . $prevID . " order by id DESC");
		$row = mysql_fetch_assoc($query);
		if($row["total"] > 0) 
		{
		  return $prevID;
		}
		else
		{
			return 0;
		}
		
	}
	else
	{
		return null;
	}
}

?>