
<!-- header and left sideber -->

<?php  ?>

<?php
    error_reporting(0);
    
    include './partials/header_leftsideber.php';
	require "classes/blog.php";
	require "classes/comment.php";

	use Frontend\Blog\Blog;
	use Frontend\Comment\Comment;
	
	$blog = new Blog;
	$comment = new Comment;

	// select title wise single blog
	if(isset($_GET['title'])){
		$title = $_GET['title'];
		$posts = $blog->selectTitlewiseBlog($title);
		$value = $posts->fetch(PDO::FETCH_ASSOC);
	}

	// show user comment
	$title = $_GET['title'];
	$comments = $comment->selectUserComment($title);
	//$total    = $comments->rowCount() ;

	// user comment save
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$comment->saveComment($_POST,$title);
	}
	
?>
<!-- start-content -->
<div class="content">
    
<div class="grids">
		<div class="grid box">
			<div class="grid-header">
				<h3 align="center"><?php echo $value['blog_title'];?> </h3>
				<ul>
					<li><span>Post By <strong style="font-size: 2vh;color: #ea4c89;font-weight: bold;"><?php echo $value['blog_author'];?></strong> on <?php echo $value['created_at'];?></span></li>
					<li>
						<a href=""> 
							<?php 
								// if($total > 0){
								// 	echo $total." comments";
								// }else{
								// 	echo "no comments";
								// }
							?>
						</a>
					</li>
				</ul>
			</div>
			<div class="grid-img-content">
			  <img src="adminbg/<?php echo $value['image'];?>" alt="picture" style="width:40vh;height:30vh;"/>
			   <span style="font-size: 0.7em;"><?php echo $value['image_caption']; ?></span>			
				<p class="grid-header"><?php echo $value['blog_description'];?></p>
				<div class="clear"> </div>
				<div class="clear"></div>
				<?php
					if(isset($_SESSION['username']) && isset($_GET['title'])){
					foreach ($comments as $comment) {
				?>	
				<h1 style="margin-left: 42%;margin-top:30px;font-weight: bold;font-size: 25px;" class="comment_user">
					<?php echo $comment['username'];?>
				</h1>
				<p style="padding-left: 50px;color: #222;margin-bottom:20px;font-weight:bold;">
					<?php echo $comment['blog_comment'];?>
				</p>
				<?php } // end foreach ?>
				<div class="clear"></div>
				<h3 style="float: left;margin-top: 45px;margin-left: 45px;display: inline-block;">
				মন্তব্য <br>
					<div>
						<b style="display:inline-block;color: #ea4c89;font-weight: bold;margin-left:10px;margin-top: 10px"><?php echo $_SESSION['username'];?></b> 
						<img src="adminbg/<?php echo $_SESSION['image'];?>" style="display:inline-block;background: #9E9E9E;width:7vh;height: 7vh;border-radius: 50%;padding: 0px 0 0 0px;">
					</div>
				</h3>
				<form class="form-horizontal comment_form" method="post" action=""> 
					<div class="form-group ">
                        <div class="col-lg-6">
                            <input type="hidden" name="user" value="<?php echo $_SESSION['user_id'];?>">
                        </div>
                    </div>
					<div class="form-group ">
                        <div class="col-lg-6">
                            <textarea class="textarea" name="comment"></textarea>
                        </div>
                    </div>
					<div class="form-group">
	                    <div class="col-lg-offset-3 col-lg-6">
	                        <button class="btn btn-block btn-info" type="submit" name="btn">পাঠিয়ে দিন</button>
	                    </div>
	                </div>
				</form>
			<?php }else{?>
				<h3 style="float: right;color:#ea4c89;margin-top: 20px;margin-right: 23%;font-weight: bold;">কমেন্ট করতে হলে আপনাকে লগিন করতে হবে ।</h3>
			<?php }?>
			</div>
			<div class="clear"></div>

		</div>
		
	
			<div class="clear"> </div>
	</div>
			<div class="clear"> </div>
			<!--  pagination -->
			
					<div class="clear"> </div>









</div>

<!-- start rightsideber -->

<?php include './partials/right_sideber.php'; ?>

<!-- start footer  -->
<?php include './partials/footer.php'; ?>
    