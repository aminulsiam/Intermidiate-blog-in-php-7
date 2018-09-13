<?php
	require "classes/blog.php";

	use Frontend\Blog\Blog;

	$blog = new Blog;

	$posts = $blog->selectBlogInFrontend();

	if(isset($_GET['page'])){
		$total_row = $posts->rowCount();
		$post_per_page = 3;
		$pages = ceil($total_row/$post_per_page);
		$page  = isset($_GET['page']) ? (int)$_GET['page'] : $_GET['page']=1;
		$start = ($pages-1)*$post_per_page;
		$posts = $blog->selectBlogByPagination($start,$post_per_page);
		print_r($posts);
		die();	
	}
	
?>

<div class="grids">
	<?php
		foreach ($posts as $value){
	?>
		<div class="grid box">
			<div class="grid-header">
				<h3 align="center"><?php echo $value['blog_title'];?> </h3>
				<ul>
				<li><span>Post By <strong style="font-size: 2vh;color: #ea4c89;font-weight: bold;"><?php echo $value['blog_author'];?></strong> on <?php echo $value['created_at'];?></span></li>
				<li><a href="#">5 comments</a></li>
				</ul>
			</div>
			<div class="grid-img-content">
			  <img src="adminbg/<?php echo $value['image'];?>" alt="picture" style="width:40vh;height:30vh;"/>
			   <span style="font-size: 0.7em;"><?php echo $value['image_caption']; ?></span>			
				<p class="grid-header"><?php echo mb_substr($value['blog_description'],0, 350);?>
					<a href="show_single_blog.php?title=<?php echo $value['blog_title'];?>" style="color:#ea4c89;font-weight: bold;font-size: 13px;text-decoration: none;">
						...continue reading
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

			<div class="content-pagenation">
				<li><a href="#">1</a></li>
				<li><a href="?page=2">2</a></li>
				<li><a href="?page=3">3</a></li>
				<div class="clear"> </div>
			</div>

			<div class="clear"> </div>




