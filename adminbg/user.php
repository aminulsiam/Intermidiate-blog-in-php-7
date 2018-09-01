<?php
require_once 'classes/user.php';

use User\User;

$user = new User;
$result = $user->selectUser();
?>
<!--header start-->
<?php include 'inc/header.php'; ?>
<!--header end-->

<!--sidebar start-->
<?php include 'inc/sidebar.php'; ?>
<!--sidebar end-->

<!--main content start-->
<section id="main-content">
    <!-- ============ main content start  =================  -->
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic table
                </div>
                <div>
                    <table class="table" ui-jq="footable" ui-options='{
                           "paging": {
                           "enabled": true
                           },
                           "filtering": {
                           "enabled": true
                           },
                           "sorting": {
                           "enabled": true
                           }}'>
                        <thead>
                            <tr>
                                <th>Sl No.</th>
                                <th>Email</th>
                                <th data-breakpoints="xs">User Image</th>
                                <th data-breakpoints="xs sm md" data-title="DOB">Created time</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $i = 1;
                            while ($value = $result->fetch(PDO::FETCH_ASSOC)) {
                                ?>
                                <tr data-expanded="true" id="row_<?php echo $value['id']; ?>">
                                    <td class="col-md-2"><?php echo $i++; ?></td>
                                    <td class="col-md-3"><?php echo $value['email']; ?></td>
                                    <td>
                                        <a href="<?php echo $value['image']; ?>" class="test-popup-link">
                                            image
                                          <!-- <img src="" width="100px" height="50px"> -->
                                        </a>
                                    </td>
                                    <td class="col-md-2"><?php echo $value['created_at']; ?></td>
                                    <td class="col-md-3">
                                        <?php
                                        if ($value['status'] == 1) {
                                            ?>              
                                            <button class="btn btn-danger userDeactive" id="<?php echo $value['id']; ?>">    
                                                deactive
                                            </button>
                                        <?php } else { ?>            
                                            <button class="btn btn-success userActive" id="<?php echo $value['id']; ?>">  
                                                active
                                            </button>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- ============ main content end  =================  -->
    <!-- footer -->
    <?php include 'inc/footer.php'; ?>     
    <!-- / footer -->

