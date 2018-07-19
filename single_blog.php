<?php
	require "classes/blog.php";
	use Frontend\Blog\Blog;
	
	$blog = new Blog;

	if(isset($_GET['blog_id'])){
		$blog_id  = $_GET['blog_id'];
		$posts = $blog->selectSingleBlogInFrontend($blog_id);
	}

	if(isset($_GET['title'])){
		$title = $_GET['title'];
		$posts = $blog->selectTitlewiseBlog($title);
		$value = $posts->fetch(PDO::FETCH_ASSOC);
	}
	
?>

<div class="grids">
		<div class="grid box">
			<div class="grid-header">
				<h3 align="center"><?php echo $value['blog_title'];?> </h3>
				<ul>
				<li><span>Post By Admin on sunday,March 05,2013 with</span></li>
				<li><a href="#">5 comments</a></li>
				</ul>
			</div>
			<div class="grid-img-content">
			  <img src="adminbg/<?php echo $value['image'];?>" alt="picture" style="width:40vh;height:30vh;"/>
			   <span style="font-size: 0.7em;"><?php echo $value['image_caption']; ?></span>			
				<p class="grid-header"><?php echo $value['blog_description'];?>
					
				</p>
				<div class="clear"> </div>
			</div>
			
			<div class="clear"></div>
		</div>
		
	
			<div class="clear"> </div>
	</div>
			<div class="clear"> </div>
			<!--  pagination -->
			
					<div class="clear"> </div>



