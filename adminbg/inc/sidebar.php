<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                
                <!-- ========== DASHBOARD ========== -->
                <li>
                    <a class="active" href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <strong>Dashboard</strong>
                    </a>
                </li>
                
                <!-- ========== CATEGORY =========== -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <strong>Category</strong>
                    </a>
                    <ul class="sub">
						<li><a href="<?php //echo base_url;?>add_category.php">Add Category</a></li>
						<li><a href="manage_category.php">Manage Category</a></li>
                    </ul>
                </li>

                <!-- ========== BLOG  =========== -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <strong>Blog</strong>
                    </a>
                    <ul class="sub">
                        <li><a href="add_blog.php">Add Blog</a></li>
                        <li><a href="manage_categorywise_blog.php">Manage Blog</a></li>
                    </ul>
                </li>

                
                <!-- ================ USER MANAGEMENT ================ -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-th"></i>
                        <strong>User Management</strong>
                    </a>
                    <ul class="sub">
                        <li><a href="user.php">Users</a></li>
                    </ul>
                </li>

                <!-- ================ MANAGE COMMENT ============ -->
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-tasks"></i>
                        <strong>User Comment</strong>
                    </a>
                    <ul class="sub">
                        <li><a href="form_component.html">All comment</a></li>
                        <li><a href="form_validation.html">Form Validation</a></li>
						<li><a href="dropzone.html">Dropzone</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-envelope"></i>
                        <span>Mail </span>
                    </a>
                    <ul class="sub">
                        <li><a href="mail.html">Inbox</a></li>
                        <li><a href="mail_compose.html">Compose Mail</a></li>
                    </ul>
                </li>

                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-glass"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub">
                        <li><a href="gallery.html">Gallery</a></li>
						<li><a href="404.html">404 Error</a></li>
                        <li><a href="registration.html">Registration</a></li>
                    </ul>
                </li>
                <li>
                    <a href="login.html">
                        <i class="fa fa-user"></i>
                        <span>Login Page</span>
                    </a>
                </li>
            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>