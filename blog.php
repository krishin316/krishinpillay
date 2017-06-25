<!DOCTYPE HTML>
<!--
	Road Trip by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Blog</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="subpage" >

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
		    <div id="main" class="container" background="images\banner4.jpg"> 
			
				<div class="row">
				  <!-- blog template 
					<div class="box">
						<header>
							<h2> blog post title</h2>
							<p> Posted by Krishin Pillay.</p>
						</header>
						<p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing blandit tempus accumsan.</p>
						
						<p> tag1,tag2,tag3</p>
						
						<a href="#" class="button special">Read More</a>
					</div>
				-->
				
				<?php 
					include 'assets/includes.php';
					$blogPosts = GetBlogPosts();
					
					foreach($blogPosts as $post)
					{
						echo ' <div class="box">';
						echo ' <header>';
						echo ' 	<h2>' . $post->title . '</h2>';
						echo ' 	<p>Posted by ' . $post->author . '</p>';
						echo ' </header>';
						echo ' <p>' . substr($post->post,0,300) . '...</p>';
						echo ' <p>' . $post->tags . '</p>';
						echo ' <a href="http://localhost/krishinpillay/blogpost.php?id=' . $post->id . '"class="button special">Read More</a>';
					    echo ' </div>';
					}
				?>
				</div>
			
		</div>

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