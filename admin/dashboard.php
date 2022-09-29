<?php
session_start();

if (isset($_SESSION['Username'])) {

    $pageTitle = 'Dashboard';

    include 'init.php';

    /* Start Dashboard Page */

    $stmt2 = $con->prepare("SELECT COUNT(UserID) FROM users");

    $stmt2->execute();


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
                            <i class="fa fa-users"></i> latest Registed Users
                        </div>
                        <div class="panel-body">
                            Test
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