<?php
    use Frontend\Blog\Blog;

    $blog = new Blog;
    $result = $blog->selectBlogByPopulerity();
?>
<div class="right-sidebar">
                <div class="search-bar">
                    <form>
                        <input type="text" value="Search" onfocus="this.value = '';" onblur="if (this.value == '') {
                                    this.value = 'Search';
                                }" />
                        <input type="submit" value="" />
                    </form>
                </div>
                <div class="clear"> </div>
                <div class="featured-Videos">
                    <h3>Featured Videos</h3>
                    <a href="#"><img src="images/videos.jpg" title="videos" /></a>
                </div>

                <div class="popular-post">
                    <h3>popular-posts</h3>
                    <?php
                        foreach($result as $value):
                    ?>
                    <a href="show_single_blog.php?title=<?php echo $value['blog_title'];?>" class="text-populerity">    
                        <div class="post-grid">
                            <img src="./adminbg/<?php echo $value['image'];?>" alt="picture">
                            <p><?php echo $value['blog_title'];?></p>
                            <div class="clear"> </div>
                        </div>
                    </a>
                    <?php endforeach;?>
                    <!-- <div class="view-all">
                        <a href="#">ViewAll</a>
                    </div> -->
                </div>
                <div class="clear"> </div>
                <!-- <div class="featured-Videos">
                    <h3>Recent Videos</h3>
                    <a href="#"><img src="images/videos.jpg" title="videos" /></a>
                </div> -->
            </div>