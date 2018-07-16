<?php
	require "classes/blog.php";
	use Frontend\Blog\Blog;
	if(isset($_GET['blog_id'])){
		$blog_id  = $_GET['blog_id'];
		$blog = new Blog;
		$posts = $blog->selectSingleBlogInFrontend($blog_id);
	}
	
	
?>

<div class="grids">
	<?php
		while ($value = $posts->fetch(PDO::FETCH_ASSOC)) {
	?>
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
					<a href="single_blog.php?<?php echo $value['id'];?>" style="color:#ea4c89;font-weight: bold;font-size: 13px;text-decoration: none;">
					</a>
				</p>
				<div class="clear"> </div>
			</div>
			
			<div class="clear"></div>
		</div>
		<?php } ?>
		
	
			<div class="clear"> </div>
	</div>
			<div class="clear"> </div>
			<!--  pagination -->
			
					<div class="clear"> </div>




