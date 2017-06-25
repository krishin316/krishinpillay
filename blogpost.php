<!DOCTYPE HTML>
<!--
	Road Trip by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
	<?php
		parse_str($_SERVER['QUERY_STRING']);
		include 'assets/includes.php';
		$blogPost_single = GetBlogSingle($id);
		echo '<title>' . $blogPost_single->title . '</title>';
	?>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage">

		<!-- Header -->
			<header id="header">
			    <?php include('templates/header.php'); ?>
				<a href="#menu"><span>Menu</span></a>
			</header>

		<!-- Nav -->

			<nav id="menu">
				<ul class="links"> 
					<?php include('templates/header_menu.php'); ?>
			    </ul>
			</nav>

		<!-- Content -->
		<!--
			Note: To show a background image, set the "data-bg" attribute below
			to the full filename of your image. This is used in each section to set
			the background image.
		-->
		<?php
			echo '<section id="post" class="wrapper bg-img" data-bg="banner2.jpg">';
			echo '	<div class="inner">';
			echo '		<article class="box">';
			echo '			<header>';
			echo '				<h2>' . $blogPost_single->title . '</h2>';
			echo '				<p>' . $blogPost_single->datePosted . '</p>';
			echo '			</header>';
			echo '			<div class="content">';
			echo '				<p>' . $blogPost_single->post . '</p>';
			echo '			</div>';
			echo '			<p>' . $blogPost_single->tags . '</p>';
			echo '			<footer>';
			echo '				<ul class="actions">';
			$prevID = GetPreviousPost($id);
			if($prevID >0)
			{
				echo '<li><a href="http://localhost/krishinpillay/blogpost.php?id=' . $prevID . '" class="button alt icon fa-chevron-left"><span class="label">Previous</span></a></li>';
			}
			
			
			$nextID = GetNextPost($id);
			if($nextID >0)
			{
					echo '<li><a href="http://localhost/krishinpillay/blogpost.php?id=' . $nextID . '" class="button alt icon fa-chevron-right"><span class="label">Next</span></a></li>';
			}
			
			
			echo '				</ul>';
			echo '			</footer>';
			echo '		</article>';
			echo '	</div>';
			echo '</section>';
		?>

		<!-- Footer -->
			<?php include('templates/footer.php'); ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>