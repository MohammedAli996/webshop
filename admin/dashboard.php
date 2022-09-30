<?php
session_start();

if (isset($_SESSION['Username'])) {

    $pageTitle = 'Dashboard';

    include 'init.php';

    /* Start Dashboard Page */

    $latesusers = 3; //$latesuser = Number Of Records To Get

   $thelatest = getLatest("*", "users", "UserID", $latesusers); // latest User Array

?>
    <div class="container home-stats text-center">
        <h1>Dashboard</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="stat st-members">
                    Total Members
                    <span><a href="user.php"><?php echo countItems('UserID', 'users') ?></a></span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat st-items">
                    Total Items
                    <span>1500</span>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat st-comments">
                    Total Comments
                    <span>3500</span>
                </div>
            </div>
        </div>
    </div>
    <div class="latest">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-users"></i> latest <?php echo $latesusers ?> Registed Users
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled latest-users">
                                <?php
                                        foreach ($thelatest as $user){
                                            echo '<li>' . $user['Username'] . '<span class="btn btn-success pull-right"><i class="fa fa-edit"></i>Edit</span></li>';
                                        }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-tag"></i> latest Items
                        </div>
                        <div class="panel-body">
                            Test
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
    <?php

    /* End Dashboard Page */

    include $tpl . 'footer.php';

} else {

    header('Location: index.php');

    exit();
}
